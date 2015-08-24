/* 
 * Стор разделов админ панели
 */


Ext.define('Adminpanel.store.Sections', {
    extend: 'Ext.data.Store',
    model: 'Adminpanel.model.Book',
    
    autoLoad: true,
    proxy: {
        type: 'ajax',
//        url : '/resources/json/products.json'
        url : '/backend/section.php'
    }
});