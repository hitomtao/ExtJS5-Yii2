<?php
echo "Накрутчик голосований 1.0";

function getHeader($data){
	return array(
		"Host: http://academdom.ru",
		"Accept: text/html, application/xml, text/xml, */*",
		"Content-Length: " . strlen($data),
	);
}

function sendRequest($url, $data, $proxy_host, $proxy_port, $debug=true) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, getHeader($data));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_PROXY, $proxy_host);         
		curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
		$json = curl_exec($ch);
		$info = curl_getinfo($ch);
		if($debug){
			echo '<div style="display:none"><br>Информация о запросе:';
			echo '<br />';
			print_r($info);
			echo '<br />';
			echo $json;
			echo '<br></div>';
		}
		curl_close($ch);
		if($info['http_code']===200){
			echo "Успешный запрос<br />\r\n";
			return json_decode($json);
		} else {
			return false;
		}
}

$handle = @fopen("proxylist.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle)) !== false) {
		$result = explode("\t", $buffer, 3);
		$host = isset($result[0]) ? $result[0] : '';
		$arrayHost = explode(":", $host);
		$proxy_host = $arrayHost[0];
		$proxy_port = $arrayHost[1];
		if ($proxy_host != '' && $proxy_port != '') {
			$data = "vote=Y&PUBLIC_VOTE_ID=6&VOTE_ID=6&vote_checkbox_10[]=94";
			list($header, $content) = sendRequest("http://academdom.ru/samaya-uyutnaya-kvartira-v-akademe/uchastniki/", $data, $proxy_host, $proxy_port);
			echo " - OK\n";
		}
    }
    fclose($handle);
}