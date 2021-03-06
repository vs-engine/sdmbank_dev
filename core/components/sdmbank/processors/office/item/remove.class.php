<?php

class sdmbankOfficeItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'sdmbankItem';
    public $classKey = 'sdmbankItem';
    public $languageTopics = array('sdmbank');
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('sdmbank_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var sdmbankItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('sdmbank_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'sdmbankOfficeItemRemoveProcessor';