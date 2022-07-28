<?php

if(!defined('_PS_VERSION_')){
    exit;
}

class webo_RemoveAllItem extends Module implements WidgetInterface
{
    public function __construct()
    {
        $this->name = "webo_removeallitem";
        $this->tab = "others";
        $this->version = "1.0.0";
        $this->author = "Webo.Agency";
        $this->bootstrap = true;
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '1.7', 'max' => _PS_VERSION_];
        $this->displayName = $this->trans('Webo remove all item', array(), 'Modules.webo_RemoveAllItem');
        $this->description = $this->trans('thanks to this module you can delete all iteam in your card use only one button', array(), 'Modules.webo_RemoveAllItem');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', array(), 'Modules.webo_RemoveAllItem');
        parent::__construct();
    }

    public function install() : bool
    {
        if(parent::install()) {
            return true;
        }
        return false;
    }

    public function uninstall()
    {
        if(parent::uninstall()) {
            return true;
        }
        $this->_errors[] = $this->trans('There was an error during the uninstallation. Please see documentation <a href="https://github.com/webo-agency/webo_taghint">here</a>', array(), 'Modules.webo_TagHint.Admin');
        return false;
    }

    public function renderWidget($hookName, $configuration)
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        try {
            return $this->fetch('module:'. $this->name.'views/templates/front/cardDeleteButton.tpl');
        } catch (Exception $e) {
            if(strpos($e->getMessage(), 'cardDeleteButton.tpl')!== false)
            {

            }
            return false;
        }
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        return [
            'cardinformation' => ''
        ];
    }
}