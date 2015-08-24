<?php

namespace common\modules\attachments\controllers;

use common\modules\attachments\models\File;
use common\modules\attachments\models\UploadForm;
use common\modules\attachments\ModuleTrait;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class FileController extends Controller
{
    use ModuleTrait;

    public function actionUpload()
    {
        $model = new UploadForm();
        $model->file = UploadedFile::getInstances($model, 'file')[0];
        $path = $this->getModule()->getUserDirPath() . DIRECTORY_SEPARATOR . $model->file->name;
		if ($model->file){
			if($model->validate()){
				if($model->file->saveAs($path)){
					return json_encode(['uploadedFile' => $model->file->name]);
				} else {
					throw new \Exception(\Yii::t('yii', 'File upload failed.'));
				}
			} else {
				throw new \Exception('validate error');
			}
		} else {
			throw new \Exception('file not found');
		}
    }

    public function actionDownload($id)
    {
        $file = File::findOne(['id' => $id]);
        $filePath = $this->getModule()->getFilesDirPath($file->hash) . DIRECTORY_SEPARATOR . $file->hash . '.' . $file->type;

        return \Yii::$app->response->sendFile($filePath, "$file->name.$file->type");
    }

    public function actionDelete($id)
    {
        $this->getModule()->detachFile($id);

        if (\Yii::$app->request->isAjax) {
            return json_encode([]);
        } else {
            return $this->redirect(Url::previous());
        }
    }

    public function actionDownloadTemp($filename)
    {
        $filePath = $this->getModule()->getUserDirPath() . DIRECTORY_SEPARATOR . $filename;

        return \Yii::$app->response->sendFile($filePath, $filename);
    }

    public function actionDeleteTemp($filename)
    {
        $userTempDir = $this->getModule()->getUserDirPath();
        $filePath = $userTempDir . DIRECTORY_SEPARATOR . $filename;
        unlink($filePath);
        if (!sizeof(FileHelper::findFiles($userTempDir))) {
            rmdir($userTempDir);
        }

        if (\Yii::$app->request->isAjax) {
            return json_encode([]);
        } else {
            return $this->redirect(Url::previous());
        }
    }
}
