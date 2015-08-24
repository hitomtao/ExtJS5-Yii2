/**
 * The main application viewport, which displays the whole application
 * @extends Ext.Viewport
 */
Ext.define('Adminpanel.view.Viewport', {
    extend: 'Ext.Viewport',
    layout: 'fit',
    
    requires: [
        'Adminpanel.view.Header',
        'Adminpanel.view.Menu'
    ],
	
    refs: [
		{
			ref: 'menu',
			selector: 'treepanel'
		},{
			ref: 'tabPanel',
			selector: 'tabpanel'
		},{
			ref: 'dashboard',
			selector: 'dashboard'
		}
	],
    
    initComponent: function() {
        var me = this;
	
		this.items = {
			dockedItems: [
				Ext.create('Adminpanel.view.Header')
			],
			layout: {
				type: 'hbox',
				align: 'stretch'
			},
			items: [
			{
				xtype: 'leftmenu',
				region: 'west',
				collapsible: true,
				split: true,
				width: 250
			},{
				region: 'center',
				xtype: 'tabpanel', // TabPanel itself has no title
				id: 'tabpanel',
				activeTab: 0,
				width: window.innerWidth - 250,
				items: [
				{
					xtype:'dashboard',
					title:'Панель виджетов',
					id:'dashboard',
					autoScroll: true,
					layout: {
						type: 'table',
						columns: 4
					},
					columns: 4
				}
				]
			}
			]
		};
        me.callParent(arguments);
    }
});