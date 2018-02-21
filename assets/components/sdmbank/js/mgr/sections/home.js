sdmbank.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'sdmbank-panel-home',
            renderTo: 'sdmbank-panel-home-div'
        }]
    });
    sdmbank.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(sdmbank.page.Home, MODx.Component);
Ext.reg('sdmbank-page-home', sdmbank.page.Home);