var sdmbank = function (config) {
    config = config || {};
    sdmbank.superclass.constructor.call(this, config);
};
Ext.extend(sdmbank, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('sdmbank', sdmbank);

sdmbank = new sdmbank();