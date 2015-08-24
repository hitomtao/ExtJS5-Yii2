/**
 * Model for a book
 */
Ext.define('Adminpanel.model.Book', {
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
