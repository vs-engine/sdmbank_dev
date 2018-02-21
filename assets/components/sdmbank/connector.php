<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var sdmbank $sdmbank */
$sdmbank = $modx->getService('sdmbank', 'sdmbank', $modx->getOption('sdmbank_core_path', null,
        $modx->getOption('core_path') . 'components/sdmbank/') . 'model/sdmbank/'
);
$modx->lexicon->load('sdmbank:default');

// handle request
$corePath = $modx->getOption('sdmbank_core_path', null, $modx->getOption('core_path') . 'components/sdmbank/');
$path = $modx->getOption('processorsPath', $sdmbank->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));