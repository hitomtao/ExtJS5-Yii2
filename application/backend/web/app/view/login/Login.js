Ext.define('Adminpanel.view.login.Login', {
    extend: 'Ext.window.Window',
	xtype: 'login',
    
    requires: [
        'Adminpanel.view.login.LoginController',
        'Adminpanel.view.login.LoginModel',
        'Ext.form.Panel',
        'Ext.button.Button',
        'Ext.form.field.Text',
        'Ext.form.field.ComboBox'
    ],
    
    viewModel: 'login',
    
    controller: 'login',
	
    bodyPadding: 10,
    title: 'Авторизация',
    closable: false,
    autoShow: true,
    
    cls: 'login',
    
    items: {
        xtype: 'form',
        reference: 'form',
        items: [{
            xtype: 'textfield',
            name: 'username',
            bind: '{username}',
            fieldLabel: 'Пользователь',
            allowBlank: false,
            enableKeyEvents: true,
            listeners: {
                specialKey: 'onSpecialKey'
            }
        }, {
            xtype: 'textfield',
            name: 'password',
            inputType: 'password',
            fieldLabel: 'Пароль',
            allowBlank: false,
            enableKeyEvents: true,
            cls: 'password',
            listeners: {
                specialKey: 'onSpecialKey'
            }
        }, {
            xtype: 'displayfield',
            hideEmptyLabel: false,
            value: 'Пароль не может быть пустым',
            cls: 'hint'
        }]
    },

    buttons: [{
        text: 'Войти',
        listeners: {
			/**
			 * Ставим обработчик нажатя на кнопку
			 */
            click: 'onLoginClick'
        }
    },{
		text: 'Регистрация',
		listeners: {
			click: 'onRegisterClick'
		}
	}]
});
