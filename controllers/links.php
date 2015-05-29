<?php

class HIDELINKS_CTRL_Links extends OW_ActionController
{

    public function awayto($params)
    {
        if (empty($params["href"])) 
        {
            throw new Redirect404Exception();
        }
        $href = base64_decode($params["href"]);
        if (empty($href)) 
        {
            throw new Redirect404Exception();
        }
        $timeout = OW::getConfig()->getValue('hidelinks','redirect_timeout');
        if ($timeout == 0)
        {
            $this->redirect($href);
        }
        else
        {
            OW::getDocument()->addMetaInfo('refresh',$timeout . ';url=' . $href, 'http-equiv');
            $this->assign('redirect_url',$href);
            $this->assign('timeout', $timeout);
        }
    }

}
