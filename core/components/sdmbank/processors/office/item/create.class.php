<?php

class sdmbankOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'sdmbankItem';
    public $classKey = 'sdmbankItem';
    public $languageTopics = array('sdmbank');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('sdmbank_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('sdmbank_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'sdmbankOfficeItemCreateProcessor';