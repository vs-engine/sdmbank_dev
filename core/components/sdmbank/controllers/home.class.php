<?php

/**
 * The home manager controller for sdmbank.
 *
 */
class sdmbankHomeManagerController extends modExtraManagerController
{
    /** @var sdmbank $sdmbank */
    public $sdmbank;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('sdmbank_core_path', null,
                $this->modx->getOption('core_path') . 'components/sdmbank/') . 'model/sdmbank/';
        $this->sdmbank = $this->modx->getService('sdmbank', 'sdmbank', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('sdmbank:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('sdmbank');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->sdmbank->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->sdmbank->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/sdmbank.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->sdmbank->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        sdmbank.config = ' . json_encode($this->sdmbank->config) . ';
        sdmbank.config.connector_url = "' . $this->sdmbank->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "sdmbank-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->sdmbank->config['templatesPath'] . 'home.tpl';
    }
}