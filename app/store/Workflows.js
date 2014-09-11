/**
 * Store for managing cars
 */
Ext.define('CarTracker.store.Workflows', {
	extend: 'CarTracker.store.Base',
    alias: 'store.workflow',
    requires: [
        'CarTracker.model.Workflow'
    ],
    restPath: 'php/workflows',
    storeId: 'Workflows',
    model: 'CarTracker.model.Workflow'
});