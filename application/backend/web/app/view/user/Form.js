/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Ext.define('Adminpanel.view.user.Form', {
    extend: 'Ext.form.Panel',
	alias: ['widget.userform'],
	readOnly: false,
	trackResetOnLoad:true,
	layout: 'fit',
	initComponent:function(){
		
		
		Ext.applyIf(this,{
			items: {
				xtype: 'panel',
				border: false,
				activeTab: 0,
				defaults:{
					border: false
				},
				items:[{
					bodyStyle: 'padding:10px;border:null',
					defaultType: 'textfield',
					layout: {
						type: 'vbox',
						align: 'stretch'  // Child items are stretched to full width
					},
					items:[{
						name: 'id',
						fieldLabel: 'id',
						xtype: 'hidden'
					},{	
						name: 'username',
						fieldLabel: 'username'
					}]
				}]
			}
		});
		
		
		
		

		/**
		 * чем выше тем лучше
		 * после того как выполнится, в форму унаследуются все свойства и методы
		 * от 'Ext.form.Panel'
		 * ВАЖНО: Вызывать после добавления элементов в форму, иначе не отрендерит
		 */
		this.callParent(arguments);
	},
	
	beforeRender: function() {
        this.callParent(arguments);
		//если указана модель, изменим имена полей
		if(this.model){
			this.changeNameItems(this.items);
		}
	},

	
	/**
	 * Рекурсивно меняет имена полей на [Имя_модели['Название_поля']]
	 * @param {type} items
	 * @returns {undefined}
	 */
	changeNameItems:function(items){
		if(items) {
			if(items.allowBlank === false && items.fieldLabel){
				items.fieldLabel += Ext.REQUIRED;
			}
			if(items.items){
				this.changeNameItems(items.items);
			} else if(items.name){
				items.name = this.model + '[' + items.name + ']';
			} else {
				for(var i=0, l=items.length;i<l; ++i){
					if(items[i].name){
						items[i].name = this.model + '[' + items[i].name + ']';
					}
					if(items[i].allowBlank === false && items[i].fieldLabel){
						items[i].fieldLabel += Ext.REQUIRED;
					}
					this.changeNameItems(items[i].items);
				}
			}
		}
	}
});