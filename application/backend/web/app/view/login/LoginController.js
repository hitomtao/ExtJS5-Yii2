/**
 * This View Controller is associated with the Login view.
 */
Ext.define('Adminpanel.view.login.LoginController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.login',
    
    loginText: 'Авторизация...',

	/**
	 * Обработчик нажатия кнопки "Войти"
	 * @returns {undefined}
	 */
    onLoginClick: function() {
        this.doLogin();
    },
    
	onRegisterClick: function() {
        Ext.Msg.alert("Регистрация", "Тут будет рега");
    },
    
	/**
	 * Обработчик авторизации
	 * @returns {undefined}
	 */
    doLogin: function() {
        var form = this.lookupReference('form');
		
		if (form.isValid()) {
            Ext.getBody().mask(this.loginText);
			
			/**
			 * Создаем login manager
			 */
            if (!this.loginManager) {
                this.loginManager = new Adminpanel.LoginManager({
                    session: this.getView().getSession(),
                    model: 'User'
                });
            }

			/**
			 * пробуйем авторищоваться
			 */
            this.loginManager.login({
                data: form.getValues(),
                scope: this,
                success: 'onLoginSuccess',
                failure: 'onLoginFailure'
            });
        }

		
    },
	
	onSpecialKey: function(field, e) {
        if (e.getKey() === e.ENTER) {
            this.doLogin();
        }
    },
    
    onLoginSuccess: function(data) {
		localStorage.removeItem("token");
		localStorage.setItem("token", data.token);
        Ext.getBody().unmask();
        // Remove Login Window
        this.getView().destroy();
		Ext.create('Adminpanel.view.Viewport');
    },
    
    
    onLoginFailure: function() {
        // Do something
        //Ext.getBody().unmask();
		debugger;
		localStorage.removeItem("token");
		Ext.Msg.show({
			title:'Ошибка',
			message: 'Авторизация не удалась. Попробовать еще раз?',
			buttons: Ext.Msg.OKCANCEL,
			icon: Ext.Msg.ERROR,
			fn: function(btn) {
				if (btn === 'ok') {
					console.log('Yes pressed');
				} else {
					console.log('Cancel pressed');
				}
			}
		});
    }

});
