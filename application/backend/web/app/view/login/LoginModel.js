/**
 * This is the View Model associated to the login view.
 */
Ext.define('Adminpanel.view.login.LoginModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.login',

    // можно задать логин по умолчанию
    data: {
        username: 'Scott'
    }
	

});
