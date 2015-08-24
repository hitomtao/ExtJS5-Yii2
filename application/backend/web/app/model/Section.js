/* 
 * Модель разделов админ-панели
 */

Ext.define('Adminpanel.model.Section', {
    extend: 'Ext.data.Model',
    requires: ['Adminpanel.model.Review'],

    fields: [
        'id',
        'name',
        'author',
        'detail',
        'price',
        'image'
    ],

    hasMany: {
        model: 'Adminpanel.model.Review', 
        name: 'reviews',
        foreignKey: 'book_id'
    }
});