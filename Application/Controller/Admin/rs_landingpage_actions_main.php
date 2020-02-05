<?php

namespace rs\landingpage\Application\Controller\Admin;

use oxdb;
use OxidEsales\Eshop\Core\Request;

class rs_landingpage_actions_main extends rs_landingpage_actions_main_parent
{
    public function render()
    {
        $ret = parent::render();

        $oPromotion = $this->getViewDataElement("edit");

        if ($oPromotion->oxactions__oxtype->value === '0' || $oPromotion->oxactions__oxtype->value === '1') {
            $this->_aViewData['editor'] = $this->_generateTextEditor(500, 150, $oPromotion, "oxactions__oxlongdesc", "details.tpl.css");
        }

        return $ret;
    }
}