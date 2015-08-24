/* 
 * Стор упревления пользователями админ панели
 */


Ext.define('Adminpanel.store.Users', {
    extend: 'Ext.data.Store',
    model: 'Adminpanel.model.User',
    autoLoad: true,
	
    proxy: {
        type: 'rest',
        url : '/v1/users',
		pageParam: false, //to remove param "page"
		startParam: false, //to remove param "start"
		limitParam: false, //to remove param "limit"
		noCache: false //to remove param "_dc"
    }
});