/**
 * Каркас ExtJs приложения (админ панель)
 */


Ext.application({
	extend: 'Ext.app.Application',
	name: 'Adminpanel',
	appFolder: '/app',
	autoCreateViewport: false,
	
	refs: [{
		ref: 'tabPanel',
		selector: 'tabpanel'
	}],

	requires: [
        'Adminpanel.view.login.Login',
        'Adminpanel.LoginManager'
    ],
	
	loadingText: 'Loading...',
	
	onLaunch: function () {
//        if (Ext.isIE8) {
//            Ext.Msg.alert('Not Supported', 'This example is not supported on Internet Explorer 8. Please use a different browser.');
//            return;
//        }
//        
//        this.session = new Ext.data.Session({
//            autoDestroy: false
//        });
//
//        this.login = new Adminpanel.view.login.Login({
//            session: this.session,
//            autoShow: true,
//            listeners: {
//                scope: this,
//                login: 'onLogin'
//            }
//        });
    },
	
	launch: function(){
		var me = this;
		
		localStorage.removeItem("token");
		
		if (Ext.isIE8) {
            Ext.Msg.alert('Not Supported', 'This example is not supported on Internet Explorer 8. Please use a different browser.');
            return;
        }
        
        this.session = new Ext.data.Session({
            autoDestroy: false
        });

        this.login = new Adminpanel.view.login.Login({
            session: this.session,
            autoShow: true,
            listeners: {
                scope: this,
                login: 'onLogin'
            }
        });
		
		/**
		 * Отслеживание нажатий элементов меню должно обрабатываться здесь 
		 * (носит глобальный характер, т.е. должно отслеживаться на уровне приложения)
		 */
		this.control('viewport leftmenu',{
			'itemclick':function(menu, record, item, index, e, eOpts){
				var action = record.get('action');
				console.log('Нажат пункт меню: \'' + record.get('text') + '\'');
				if(action){
					var parts = action.split(':'),
						controller = parts[0],
						method = parts[1];
					
					if(parts.length == 2){
						console.log('Controller: '+controller+', method: '+method);
						this.run(controller, method, record.data);
					}
				}
			}
		},this);
	},
	
	/**
     * Called when the login controller fires the "login" event.
     *
     * @param loginController
     * @param user
     * @param loginManager
     */
    onLogin: function (loginController, user, loginManager) {
        this.login.destroy();

        this.loginManager = loginManager;
        this.user = user;
        
        this.showUI();
    },
	
	showUI: function() {
        this.viewport = new Adminpanel.view.main.Main({
            session: this.session,
            viewModel: {
                data: {
                    currentUser: this.user
                }
            }
        });
    },
    
    getSession: function() {
        return this.session;
    },
	
	/**
	 * Запустить команду
	 */
	run: function(controller, action, options){
		var me = this;
		var arg = [this].concat(Array.prototype.slice.call(arguments, 2));
		debugger;
		Ext.require(this.getModuleClassName(controller, 'controller'),function(){
			controller = me.getController(controller);
			if(controller[action])
			{
				controller[action].apply(controller, arg);
				controller.onLaunch(me);
			} else {
				Ext.Msg.error('Ошибка','Отсутствует метод '+action+' в контроллере '+controller);
			}
		});
	},
	
	/**
	 * Вставить в tabpanel новый таб
	 * @param {} item объект формата 
	 * {
	    xtype: 'userlist',
	    title: 'Список пользователей',
	    items: me.getUserList()
	}
	 */
	addTab:function(item, controller){
	    var object = {
			id: controller.id,
			closable: true,
			title: item.title,
			layout: 'fit',
			items: [item]
	    };

	    var tab = this.getTab('test');
	    if(!tab){
			tab = this.getTabPanel().add(object);
	    }
	    tab.show();
	    return tab;
	},
	
	/**
	 * Получить таб
	 * @param {type} id
	 * @returns {Anonym$0@call;getTabPanel@pro;items@call;findBy}
	 */
	getTab:function(id){
		return this.getTabPanel().items.findBy(function(item){
			return item.id == id;
		});
	}

});

Ext.Msg.info = function(title, msg)
{
	return Ext.Msg.show({
		title: title,
		msg: msg,
		buttons: Ext.Msg.OK,
		icon: Ext.Msg.INFO
   });
};

Ext.Msg.error = function(title, msg)
{
	return Ext.Msg.show({
		title: title,
		msg: msg,
		buttons: Ext.Msg.OK,
		icon: Ext.Msg.ERROR
   });
};

Ext.Msg.warning = function(title, msg)
{
	return Ext.Msg.show({
		title: title,
		msg: msg,
		buttons: Ext.Msg.OK,
		icon: Ext.Msg.WARNING
   });
};

Ext.Msg.success = function(title, msg)
{
	return Ext.Msg.show({
		title: title,
		msg: msg,
		buttons: Ext.Msg.OK,
		icon: 'x-message-box-success'
   });
};

/**
 * Тулбар выбора темы
 * @returns {undefined}
 */
(function() {
    function getQueryParam(name, queryString) {
        var match = RegExp(name + '=([^&]*)').exec(queryString || location.search);
        return match && decodeURIComponent(match[1]);
    }

    function hasOption(opt) {
        var s = window.location.search;
        var re = new RegExp('(?:^|[&?])' + opt + '(?:[=]([^&]*))?(?:$|[&])', 'i');
        var m = re.exec(s);

        return m ? (m[1] === undefined ? true : m[1]) : false;
    }

    var scriptTags = document.getElementsByTagName('script'),
        defaultTheme = 'crisp',
        defaultRtl = false,
        i = scriptTags.length,
        requires = [
            'Ext.window.MessageBox',
            'Ext.toolbar.Toolbar',
            'Ext.form.field.ComboBox',
            'Ext.form.FieldContainer',
            'Ext.form.field.Radio'

        ],
        comboWidth = {
            classic: 160,
            gray: 160,
            neptune: 180,
            crisp: 180,
            'neptune-touch': 220,
            'crisp-touch': 220
        },
        labelWidth = {
            classic: 40,
            gray: 40,
            neptune: 45,
            crisp: 45,
            'neptune-touch': 55,
            'crisp-touch': 55
        },
        defaultQueryString, src, theme, rtl, toolbar;

    while (i--) {
        src = scriptTags[i].src;
        if (src.indexOf('include-ext.js') !== -1) {
            defaultQueryString = src.split('?')[1];
            if (defaultQueryString) {
                defaultTheme = getQueryParam('theme', defaultQueryString) || defaultTheme;
                defaultRtl = getQueryParam('rtl', defaultQueryString) || defaultRtl;
            }
            break;
        }
    }

    Ext.themeName = theme = getQueryParam('theme') || defaultTheme;
    
    rtl = getQueryParam('rtl') || defaultRtl;

    if (rtl.toString() === 'true') {
        requires.unshift('Ext.rtl.*');
        Ext.define('Ext.examples.RtlComponent', {
            override: 'Ext.Component',
            rtl: true
        });
    }

    Ext.require(requires);

    Ext.onReady(function() {
        Ext.getBody().addCls(Ext.baseCSSPrefix + 'theme-' + Ext.themeName);

        // prevent touchmove from panning the viewport in mobile safari
        if (Ext.supports.TouchEvents) {
            Ext.getDoc().on({
                touchmove: function(e) {
                    // If within a scroller, don't let the document use it
                    if (Ext.scroll.Scroller.isTouching) {
                        e.preventDefault();
                    }
                },
                translate: false,
                delegated: false
            });
        }

        if (hasOption('nocss3')) {
            Ext.supports.CSS3BorderRadius = false;
            Ext.getBody().addCls('x-nbr x-nlg');
        }

        if (hasOption('nlg')) {
            Ext.getBody().addCls('x-nlg');
        }

        function setParam(param) {
            var queryString = Ext.Object.toQueryString(
                Ext.apply(Ext.Object.fromQueryString(location.search), param)
            );
            location.search = queryString;
        }

        function removeParam(paramName) {
            var params = Ext.Object.fromQueryString(location.search);

            delete params[paramName];

            location.search = Ext.Object.toQueryString(params);
        }

        setTimeout(function() {
            toolbar = Ext.widget({
                xtype: 'toolbar',
                border: true,
                rtl: false,
                id: 'options-toolbar',
                floating: true,
                fixed: true,
                preventFocusOnActivate: true,
                draggable: {
                    constrain: true
                },
                defaults : { rtl : false },
                items: [{
                    xtype: 'combo',
                    width: comboWidth[Ext.themeName],
                    labelWidth: labelWidth[Ext.themeName],
                    fieldLabel: 'Theme',
                    displayField: 'name',
                    valueField: 'value',
                    labelStyle: 'cursor:move;',
                    margin: '0 5 0 0',
                    store: Ext.create('Ext.data.Store', {
                        fields: ['value', 'name'],
                        data : [
                            { value: 'neptune', name: 'Neptune' },
                            { value: 'neptune-touch', name: 'Neptune Touch' },
                            { value: 'crisp', name: 'Crisp' },
                            { value: 'crisp-touch', name: 'Crisp Touch' },
                            { value: 'classic', name: 'Classic' },
                            { value: 'gray', name: 'Gray' }
                        ]
                    }),
                    value: theme,
                    listeners: {
                        select: function(combo) {
                            var theme = combo.getValue();
                            if (theme !== defaultTheme) {
                                setParam({ theme: theme });
                            } else {
                                removeParam('theme');
                            }
                        }
                    }
                }, {

                    /**
                     * Only visible in repoDevMode and on QA sites
                     */
                    xtype: 'button',
                    hidden: !(Ext.repoDevMode || location.href.indexOf('qa.sencha.com') !== -1),
                    enableToggle: true,
                    pressed: rtl,
                    text: 'RTL',
                    margin: '0 5 0 0',
                    listeners: {
                        toggle: function(btn, pressed) {
                            if (pressed) {
                                setParam({ rtl: true });
                            } else {
                                removeParam('rtl');
                            }
                        }
                    }
                }, {
                    xtype: 'tool',
                    type: 'close',
                    handler: function() {
                        toolbar.destroy();
                    }
                }],

                // Extra constraint margins within default constrain region of parentNode
                constraintInsets: '0 -' + (Ext.getScrollbarSize().width + 5) + ' 0 0'
            });
            toolbar.show();
            toolbar.anchorTo(
                document.body,
                Ext.optionsToolbarAlign || 'tr-tr',
                [-(Ext.getScrollbarSize().width + 5), 0],  //adjust for scrollbar offsets
                false,                                     //anim
                true                                       //monitor scroll
            );

        }, 100);

    });
})();

/**
 * Чтобы работали кросс-доменные запросы
 */
Ext.Ajax.useDefaultXhrHeader = false;
// Can also be specified in the request options
Ext.Ajax.cors = true;

Ext.onReady(function() {
	/**
	 * Добавляю в заголовки каждого запроса выданный токен
	 */
	Ext.Ajax.on('beforerequest', function(conn, options){
		if (!(/^http:.*/.test(options.url) || /^https:.*/.test(options.url))) {
			options.headers = options.headers || {};
			options.headers["Token"] = localStorage.token ? localStorage.token : null;
		}              
	}, this);
});