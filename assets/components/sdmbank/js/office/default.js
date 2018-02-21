Ext.onReady(function () {
    sdmbank.config.connector_url = OfficeConfig.actionUrl;

    var grid = new sdmbank.panel.Home();
    grid.render('office-sdmbank-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});