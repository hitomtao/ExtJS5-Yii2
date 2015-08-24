/* 
 * Список пользователей
 */


Ext.define('Adminpanel.view.user.List', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.userlist',
	
    initComponent: function() {
		var me = this;
		
		
        Ext.apply(this, {
			title: 'Пользователи',
			iconCls: 'icon-user',
			store: 'Users',
			id: 'UserList',
			columns: [
				{ text: 'Имя',  dataIndex: 'username' },
				{ text: 'Email', dataIndex: 'email', flex: 1 }
			],
			dockedItems: [{
				xtype: 'toolbar',
				items: [{
					xtype: 'button',
					text: 'Добавить',
					action: 'addToStore',
					iconCls: 'icon-add'
				}, '-',{
					xtype: 'button',
					text: 'Изменить',
					action: 'edit',
					iconCls: 'icon-edit'
				}, '-', {
					itemId: 'delete',
					text: 'Удалить',
					iconCls: 'icon-delete',
					disabled: true,
					handler: function(){
						
					}
				}]
			}]
        });
                
        this.callParent(arguments);
    }
});