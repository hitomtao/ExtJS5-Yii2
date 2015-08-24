/* 
 * Меню админ панели
 */


Ext.define('Adminpanel.view.Menu', {
    extend: 'Ext.tree.Panel',
    alias : 'widget.leftmenu',
    requires: ['Ext.data.TreeStore'],
    title: 'Разделы',
	rootVisible: false,
	useArrows: true,
	singleExpand: true,
    animate: true,
	initComponent:function(){
		
		this.store = Ext.create('Ext.data.TreeStore', {
			autoLoad: false,
			autoSync: true,
			fields:[
				'params', 
				'text', 
				'action'
			],
			root: {
				expanded: true
			},
			proxy: {
				type: 'rest',
				url : '/v1/menus',
				appendId: false,
				noCache: false,
				rootVisible: false,
				reader: {
					type: 'json'
				}
			}
		});
		this.callParent(arguments);
	}
});