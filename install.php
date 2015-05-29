<?php
OW::getPluginManager()->addPluginSettingsRouteName('hidelinks', 'hidelinks_admin');

if ( !OW::getConfig()->configExists('hidelinks', 'new_tab') )
{
    OW::getConfig()->addConfig('hidelinks', 'new_tab', 0, 'Open Links in new tab');
}

if ( !OW::getConfig()->configExists('hidelinks', 'redirect_timeout') )
{
    OW::getConfig()->addConfig('hidelinks', 'redirect_timeout', 0, 'Timeout before redirectiong user');
}

BOL_LanguageService::getInstance()->addPrefix('hidelinks', 'Hidelinks');
OW::getLanguage()->importPluginLangs(OW::getPluginManager()->getPlugin('hidelinks')->getRootDir() . 'langs.zip', 'hidelinks');


?>