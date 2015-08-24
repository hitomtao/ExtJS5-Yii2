/**
 * The store used for books
 */
Ext.define('Adminpanel.store.Books', {
    extend: 'Ext.data.Store',
    model: 'Adminpanel.model.Book',
    
    autoLoad: true,
    proxy: {
        type: 'ajax',
        url : '/resources/json/products.json'
    }
});