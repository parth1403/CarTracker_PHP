/**
 * Abstract REST proxy 
 */
Ext.define('CarTracker.proxy.Rest', {
    extend: 'Ext.data.proxy.Rest',
    alias: 'proxy.baserest',
    limitParam: 'max',
    startParam: 'offset',
    sortParam: 'sortorder',
    writer: {
        type: 'json',
        encode: true,
        root:'postdata',
        writeAllFields: true
    },
    reader: {
        type: 'json',
        root: 'data',
        totalProperty: 'count'
    },
    actionMethods: {
        create: 'POST',
        read: 'GET',
        update: 'POST',
        destroy: 'DELETE'
    },
    
    afterRequest: function( request, success ) {
        var me = this;
        // fire requestcomplete event
        me.fireEvent( 'requestcomplete', request, success );
    },
});