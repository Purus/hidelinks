<?php

OW::getPluginManager()->addPluginSettingsRouteName('hidelinks', 'hidelinks_admin');

if ( !Updater::getConfigService()->configExists('hidelinks', 'new_tab') )
{
    Updater::getConfigService()->addConfig('hidelinks', 'new_tab', 0, 'Open Links in new tab');
}

if ( !Updater::getConfigService()->configExists('hidelinks', 'redirect_timeout') )
{
    Updater::getConfigService()->addConfig('hidelinks', 'redirect_timeout', 0, 'Timeout before redirectiong user');
}

BOL_LanguageService::getInstance()->addPrefix('hidelinks', 'Hidelinks');
Updater::getLanguageService()->importPrefixFromZip(dirname(__FILE__).DS.'langs.zip', 'hidelinks');
    
?>