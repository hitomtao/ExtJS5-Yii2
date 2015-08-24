/* 
 * Контроллер упревления пользователями
 */


Ext.define('Adminpanel.controller.User', {
	extend: 'Ext.app.Controller', // ------------------ переделать потом на viewController http://habrahabr.ru/post/224645/
	models: ['User'],
	stores: ['Users'],
	
	selectorList:'list',
	selectorForm:'form',
	titleEditForm: "#{id} {name}",
	
	requires: [
	    'Adminpanel.view.user.List',
	    'Adminpanel.view.user.Form'
	],
	
	refs: [
		{ref: 'userList', selector: 'userlist'},
		{ref: 'userForm', selector: 'userform'}
	],
	
	init : function () {
        var me = this;
		var grid_id = this.getSelectorGrid();
		
		me.getUsersStore().on({
            scope: me,
            load : me.onGetUsersStoreLoad
        });

        me.control({
            'userlist button[action=addToStore]': {
				click: function(){
					alert('Превед! Добавляем Фландерса');
					var st = this.getUsersStore();
					var simpsonsStore = Ext.create('Ext.data.Store', {
						storeId:'simpsonsStore',
						fields:['username', 'email'],
						data:{'items':[
							{'username': 'Lisa', "email":"lisa@simpsons.com"},
							{'username': 'Bart', "email":"bart@simpsons.com"},
							{'username': 'Homer', "email":"homer@simpsons.com"},
							{'username': 'Marge', "email":"marge@simpsons.com"}
						]},
						proxy: {
							type: 'memory',
							reader: {
								type: 'json',
								rootProperty: 'items'
							}
						}
					});

					st.add(simpsonsStore.data.items);
				}
			}

        });
		
		this.control(grid_id+' button[action=edit]',{
			click: this.onEdit
		});

		this.control(grid_id, {
			'itemdblclick': function(view ,record){
				this.edit(record);
			}
		});
    },
	
	getSelectorGrid:function(){
		return this._id.toLowerCase() + this.selectorList;
	},
	
	onEdit:function(button){
		var grid = button.up('grid');
		grid.getSelectionModel().selected.each(function(item){
			this.edit(item, grid);
		},this);
	},
	
	edit:function(record, grid, callback)
	{
		var tpl = new Ext.Template(this.titleEditForm),
			win = this.createWinForm(this._id+'-'+record.getId(), tpl.apply(record.data), record, grid);
		win.show();
		if(callback){
			win.down('form').onSave = callback;
		}
		return win;
	},
	
	onGetUsersStoreLoad: function(store, records) {
//       debugger;
//	   var st = Ext.data.StoreManager.lookup('simpsonsStore');
//	   st.add(records);
    },
		
	list: function(){
		
		var me = this,
		    id_tab = 'UserList',
		    tab = me.application.getTab(id_tab);
	
		if(!tab) {
		    var item = {
				xtype: 'userlist',
				title: 'Список пользователей',
				items: me.getUserList()
		    };
		    tab = me.application.addTab(item, me);
		}
	},
	
	
	createWinForm:function(id, title, record, grid){
		var form = null,
			window = Ext.WindowMgr.get(id);
        if(!window){
			if(record)
			{
				form = this.getForm().create({
					waitMsgTarget: true,
					border: false,
					id: Ext.id(),
					onlyCreate: true,
					model: this.getModelName(),
					paramOrder: [record.idProperty]
				});
				/**
				 * Передать параметры записи в форму
				 */
				form.getForm().trackResetOnLoad = true;
				form.getForm().loadRecord(record);
				form.getForm().trackResetOnLoad = false;
			} else {
				form = this.getForm().create({
					waitMsgTarget: true,
					border: false,
					id: Ext.id(),
					model: this.getModelName()
				});
			}
			window = Ext.create("Ext.Window", Ext.apply({
				width: 800,
				id: id,
				title: title,
				border: false,
				iconCls: 'icon-layers',
				constrainHeader: true,
				items: form
			}, form.cfgWin));
			window.show();
		} 
		return window;
	},
	
	getList:function(){
		return this.getView(this._id.toLowerCase()+'.List');
	},
	getForm:function(){
		return this.getView(this._id.toLowerCase()+'.Form');
	},
	getModelName: function(){
		return this.models[0];
	}
});