/**
 * Store for managing car models
 */
Ext.define('CarTracker.store.option.Models', {
    extend: 'CarTracker.store.option.Base',
    alias: 'store.option.model',
    requires: [
        'CarTracker.model.option.Model'
    ],
    restPath: 'php/models',
    storeId: 'Models',
    model: 'CarTracker.model.option.Model'
});