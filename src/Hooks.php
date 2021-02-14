<?php

/**
 * mobilecontent extension for Contao Open Source CMS
 *
 * @package ContaoMobilecontentBundle
 * @author  Glen Langer (BugBuster)
 * @author  Marcel Mathias Nolte
 * @website	https://github.com/marcel-mathias-nolte
 * @license LGPL
 */

namespace MarcelMathiasNolte\ContaoMobilecontentBundle;

/**
 * Class Mobile_Detection_Hooks
 *
 * @copyright  Glen Langer 2018 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @package    Mobiledetection
 */
class Hooks extends \Frontend
{
    /**
     * Hook:  $GLOBALS['TL_HOOKS']['generatePage']
     *
     * @param Database_Result $objPage
     * @param Database_Result $objLayout
     * @param PageRegular $objPageRegular
     */
    public function insertInsertTagMD( $objPage,  $objLayout,  $objPageRegular)
    {
        // set vary header for browsers to avoid caching in Proxies for different browsers
        header('Vary: User-Agent', false);

        // add mobiledetectioncss class to page css class
        $objPage->cssClass = $objPage->cssClass . ' {{cache_mobiledetectioncss}}';
    }

    /**
     * Hook:  $GLOBALS['TL_HOOKS']['replaceInsertTags']
     *
     * @param  string $strTag
     * @return boolean|string
     */
    public function mobiledetectionReplaceInsertTags($strTag)
    {

        if($strTag != 'cache_mobiledetectioncss')
        {
            return false; // not for us
        }

        return MobileDetection::getDeviceType();

    }
}
