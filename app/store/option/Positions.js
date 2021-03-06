/**
 * Store for managing staff positions
 */
Ext.define('CarTracker.store.option.Positions', {
    extend: 'CarTracker.store.option.Base',
    alias: 'store.option.position',
    requires: [
        'CarTracker.model.option.Position'
    ],
    restPath: 'php/positions',
    storeId: 'Positions',
    model: 'CarTracker.model.option.Position'
});