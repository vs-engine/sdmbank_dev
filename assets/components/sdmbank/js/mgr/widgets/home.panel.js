sdmbank.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'sdmbank-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('sdmbank') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('sdmbank_items'),
                layout: 'anchor',
                items: [{
                    html: _('sdmbank_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'sdmbank-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    sdmbank.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(sdmbank.panel.Home, MODx.Panel);
Ext.reg('sdmbank-panel-home', sdmbank.panel.Home);
