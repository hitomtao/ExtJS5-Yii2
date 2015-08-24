/**
 * The application header displayed at the top of the viewport
 * @extends Ext.Component
 */
Ext.define('Adminpanel.view.Header', {
    extend: 'Ext.Component',
    
    dock: 'top',
    baseCls: 'app-header',
    
    initComponent: function() {
        Ext.applyIf(this, {
            html: 'Панель управления'
        });
                
        this.callParent(arguments);
    }
});