/**
 * Model for a books review.
 */
Ext.define('Adminpanel.model.Review', {
    extend: 'Ext.data.Model',

    fields: [
        'product_id',
        'author',
        'rating',
        'date',
        'title',
        'comment'
    ],
    belongsTo: {
        model: 'Adminpanel.model.Book',
        getterName: 'getBook',
        setterName: 'setBook'
    }
});
