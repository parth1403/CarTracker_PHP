/**
 * Main panel for displaying details for {@link CarTracker.model.Car} records
 */
Ext.define('CarTracker.view.car.edit.tab.Detail', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.car.edit.tab.detail',
    layout: 'form',
	initComponent: function() {
		var me = this;
        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'fieldset',
                    title: 'Car Info',
                    collapsible: true,
                    defaults: {
                        layout: 'hbox',
                        margins: '0 10 0 10'                
                    },
                    items: [
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'Make',
                                    fieldLabel: 'Make',
                                    displayField: 'LongName',
                                    valueField: 'MakeID',
                                    store: {
                                        type: 'option.make'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                },
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'Model',
                                    fieldLabel: 'Model',
                                    displayField: 'LongName',
                                    valueField: 'ModelID',
                                    store: {
                                        type: 'option.model'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                },
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'Status',
                                    fieldLabel: 'Status',
                                    displayField: 'LongName',
                                    valueField: 'StatusID',
                                    store: {
                                        type: 'option.status'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'numberfield',
                                    name: 'Year',
                                    fieldLabel: 'Year',
                                    minValue: 1920
                                },
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'Category',
                                    fieldLabel: 'Category',
                                    displayField: 'LongName',
                                    valueField: 'CategoryID',
                                    store: {
                                        type: 'option.category'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                },
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'Color',
                                    fieldLabel: 'Color',
                                    displayField: 'LongName',
                                    valueField: 'ColorID',
                                    store: {
                                        type: 'option.color'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'numberfield',
                                    name: 'Mileage',
                                    fieldLabel: 'Mileage',
                                    minValue: 0
                                },
                                {
                                    xtype: 'textfield',
                                    name: 'StockNumber',
                                    fieldLabel: 'Stock Number'
                                },
                                {
                                    xtype: 'textfield',
                                    name: 'VIN',
                                    fieldLabel: 'VIN'
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'textfield',
                                    name: 'Fuel',
                                    fieldLabel: 'Fuel'
                                },
                                {
                                    xtype: 'textfield',
                                    name: 'Engine',
                                    fieldLabel: 'Engine'
                                },
                                {
                                    xtype: 'textfield',
                                    name: 'Transmission',
                                    fieldLabel: 'Transmission'
                                },
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'DriveTrain',
                                    fieldLabel: 'Drive Train',
                                    displayField: 'LongName',
                                    valueField: 'DriveTrainID',
                                    store: {
                                        type: 'option.drivetrain'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    editable: false,
                                    forceSelection: true
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'htmleditor',
                                    name: 'Description',
                                    fieldLabel: 'Description'
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'fieldset',
                    title: 'Sales Info',
                    collapsible: true,
                    defaults: {
                        layout: 'hbox',
                        margins: '0 10 0 10'                
                    },
                    items: [
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'numberfield',
                                    name: 'ListPrice',
                                    fieldLabel: 'List Price'
                                },
                                {
                                    xtype: 'datefield',
                                    name: 'AcquisitionDate',
                                    fieldLabel: 'Date Acquired'
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'numberfield',
                                    name: 'SalePrice',
                                    fieldLabel: 'Sale Price',
                                    disabled: !CarTracker.LoggedInUser.inRole( 1 )
                                },
                                {
                                    xtype: 'datefield',
                                    name: 'SaleDate',
                                    fieldLabel: 'Sale Date',
                                    disabled: !CarTracker.LoggedInUser.inRole( 1 )
                                }
                            ]
                        },
                        {
                            xtype: 'fieldcontainer',
                            items: [
                                {
                                    xtype: 'ux.form.field.remotecombobox',
                                    name: 'SalesPeople',
                                    fieldLabel: 'Sales People',
                                    displayField: 'LastName',
                                    valueField: 'StaffID',
                                    store: {
                                        type: 'staff'
                                    },
                                    plugins: [
                                        { ptype: 'cleartrigger' }
                                    ],
                                    multiSelect: true,
                                    editable: false,
                                    forceSelection: true,
                                    disabled: !CarTracker.LoggedInUser.inRole( 1 )
                                }
                            ]
                        }
                    ]
                }
            ]
        });
        me.callParent( arguments );
	}
})