<?php

class HIDELINKS_CTRL_Admin extends ADMIN_CTRL_Abstract
{

    public function __construct()
    {
        parent::__construct();
        $this->setPageHeading('Hidelinks');
        $this->setPageHeadingIconClass('ow_ic_gear_wheel');
    }

    private function lang($key, $vars = null)
    {
        return OW::getLanguage()->text('hidelinks', $key, $vars);
    }
    
    /**
     * Default action
     */
    public function index()
    {
        $form = new SettingsForm($this);

        if ( !empty($_POST) && $form->isValid($_POST) )
        {
            $data = $form->getValues();
            
            OW::getConfig()->saveConfig('hidelinks', "new_tab", $data["new_tab"]);
            OW::getConfig()->saveConfig('hidelinks', "redirect_timeout", $data["redirect_timeout"]);
            OW::getFeedback()->info(OW::getLanguage()->text('hidelinks', 'settings_updated'));            
        }
        
        $this->assign("frm",$form->getElements());

        $this->addForm($form);
    }
}

class SettingsForm extends Form
{

    public function __construct( $ctrl )
    {
        parent::__construct('form');

        $config = OW::getConfig()->getValues('hidelinks');

        $ctrl->assign('config', $config);

        $new_tab = new CheckboxField("new_tab");
        $new_tab->setLabel($this->lang("new_tab"))        
            ->setValue($config["new_tab"]);
        $this->addElement($new_tab);

        $redirect_timeout = new TextField("redirect_timeout");
        $redirect_timeout->setLabel($this->lang("redirect_timeout"))        
            ->addValidator(new IntValidator(0,1000))
            ->setValue($config["redirect_timeout"]);
        $this->addElement($redirect_timeout);
        
        
        $submit = new Submit('submit');
        $submit->setValue($this->lang("save_settings"));
        $this->addElement($submit);
    }
    
    private function lang($key,$vars = null)
    {
        return OW::getLanguage()->text("hidelinks", $key, $vars);
    }
    
}


