/* 
 * Контроллер разделов админ панели (в меню)
 */


Ext.define('Adminpanel.controller.Section', {
    extend: 'Ext.app.Controller',
    models: ['Section'],
    stores: [
		'Sections'
	],
    refs: [
		{ref: 'sectionSideBar', selector: 'sectionsidebar'},
		{ref: 'sectionView', selector: 'sectionview'}
    ],
    
    init: function() {
        var me = this;

//        me.control({
//            'booksidebar': {
//                selectionchange: me.onSideBarSelectionChange
//            }
//        });
        
		//алиас представления view/book/Sidebar - alias: 'widget.booksidebar',
//		me.control('.booksidebar', {selectionchange: me.onSideBarSelectionChange});
//		me.control('sectionsidebar', {selectionchange: me.onSideBarSelectionChange});
//		me.control('leftmenu', {selectionchange: me.onSideBarSelectionChange});
		
		
        me.getSectionsStore().on({
            scope: me,
            load : me.onSectionsStoreLoad
        });
    },
    
	/**
	 * Событие выделения пункта меню
	 * @param {type} view
	 * @param {type} records
	 * @returns {undefined}
	 */
//    onSideBarSelectionChange: function(view, records) {
//        debugger;
////		if (records.length) {
////            this.showSection(records[0]);
////        }
//		
//    },
    
//	onLaunch: function() {
//		this.store = this.getSectionsStore();
////        this.getSectionSideBar().bindStore(this.getSectionsStore());
//    },
    
    
    /**
     * Вызывается, когда книжный стор загружен
	 * Проверить, если есть несколько записей и показать первую запись
     */
    onSectionsStoreLoad: function(store, records) {
        Ext.defer(function() {
            if (records.length) {
                var record = records[0],
                    me = this;
//              me.getSectionSideBar().getSelectionModel().select(record);
				console.log(record);
				this.showSection(record);
            }
        }, 500, this);
    },
    
    /**
	 * Показать определенную запись
     */
    showSection: function(record) {
        var me = this;
        me.getSectionView().bind(record);
    }
	
	
});