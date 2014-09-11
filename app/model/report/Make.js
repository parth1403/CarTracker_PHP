/**
 * {@link Ext.data.Model} for Make Sales object
 */
Ext.define('CarTracker.model.report.Make', {
    extend: 'Ext.data.Model',
    fields: [
        // non-relational properties
        {
            name: 'Make',
            type: 'string',
            mapping: 'Make',
            persist: false
        },
        {
            name: 'Model',
            type: 'string',
            mapping: 'Model',
            persist: false
        },
        {
            name: 'TotalSales',
            type: 'int',
            persist: false,
            mapping: 'TotalSales'
        }
    ]
});