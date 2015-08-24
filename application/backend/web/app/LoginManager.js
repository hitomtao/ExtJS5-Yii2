/**
 * This class manages the login process.
 */
Ext.define('Adminpanel.LoginManager', {
	extend: 'Ext.app.Controller',
    config: {
        /**
         * @cfg {Class} model
         * The model class from which to create the "user" record from the login.
         */
        model: null,

        /**
         * @cfg {Ext.data.Session} session
         */
        session: null
    },

    constructor: function (config) {
//		debugger;
//      this.initConfig(config);
		this.model = config.model;
		this.session = config.session;
    },

    applyModel: function(model) {
		return model && Ext.data.schema.Schema.lookupEntity(model);
    },

	/**
	 * выполняем запрос, в котором указан логин и пароль
	 * @param {type} options
	 * @return {undefined}
	 */
    login: function(options) {
        Ext.Ajax.request({
            url: '/v1/users/login',
            method: 'POST',
			headers: { 
				'Authorization': 'Basic ' + btoa(options.data.username + ":" + options.data.password)
			},
            scope: this,
            callback: this.onLoginReturn,
            original: options
        });
		/**
		 * Был отправлен запрос, но результат не будет получен в текщий момент времени
		 */
    },
    
	/**
	 * Результат запроса будет доступен здесь! важно
	 */
    onLoginReturn: function(options, success, response) {
        options = options.original;
		if (success) {
			var data = response.responseText;
			Ext.callback(options.success, options.scope, [Ext.util.JSON.decode(data)]);
			return;
		}
        Ext.callback(options.failure, options.scope, [response]);
    }
});
