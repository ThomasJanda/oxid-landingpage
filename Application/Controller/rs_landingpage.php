<?php
namespace rs\landingpage\Application\Controller;

use OxidEsales\Eshop\Core\Request;
use OxidEsales\Eshop\Core\Registry;

class rs_landingpage extends \OxidEsales\Eshop\Application\Controller\FrontendController
{
    protected $_sThisTemplate = 'rs_landingpage.tpl';

    protected $_oActionList = null;

    protected $_oAction = null;

    public function render()
    {
        $request = oxNew(Request::class);
        $sAction = $request->getRequestParameter( 'actionlist' );

        if(!empty($sAction))
        {
            $this->_oActionList = oxNew( 'oxarticlelist' );
            $this->_oActionList->loadActionArticles( $sAction );

            $this->_oAction = oxNew( 'oxactions' );
            $this->_oAction->load($sAction);
        }

        return parent::render();
    }

    public function getTitle()
    {
        if($this->_oAction != null)
        {
            return $this->_oAction->oxactions__oxtitle->value;
        }
    }

    public function getContent()
    {
        if($this->_oAction != null)
        {
            $sContent = $this->_oAction->getLongDesc();
            return Registry::get("oxUtilsView")->parseThroughSmarty($sContent);
        }
    }

    public function getActionProducts()
    {
        return $this->_oActionList;
    }

    public function getBreadCrumb()
    {
        $aPaths = array();
        $aPath = array();
        $aPath['title'] = $this->getTitle();
        $aPath['link']  = $this->getLink();
        $aPaths[] = $aPath;
        return $aPaths;
    }

    public function getLink($iLang = null)
    {
        if ( !isset( $iLang ) ) {
            $iLang = Registry::getLang()->getBaseLanguage();
        }

        $oConf = $this->getConfig();

        $request = oxNew(Request::class);
        $sAction = $request->getRequestParameter( 'actionlist' );

        $sUrl = 'index.php?cl=rs_landingpage&amp;actionlist='.$sAction;

        $oSeoEncoder = oxNew('oxseoencoder');
        $sSeoUrl = $oSeoEncoder->fetchSeoUrl($sUrl,$iLang);

        if($sSeoUrl)
        {
            return $oConf->getCurrentShopUrl() . $sSeoUrl;
        }

        $aParams['actionlist'] = $sAction;
        return Registry::get("oxUtilsUrl")->processUrl( $oConf->getShopCurrentURL( $iLang ) . $this->_getRequestParams(), true, $aParams, $iLang);
    }
}