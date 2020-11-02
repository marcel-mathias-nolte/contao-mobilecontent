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
use Detection\MobileDetect;

/**
 * Class Mobile_Detection
 *
 * @author     Glen Langer (BugBuster)
 * @author     Marcel Mathias Nolte
 * @package    ContaoMobilecontentBundle
 */
class MobileDetection extends \Contao\System
{
    public $MobileDetect = null;

    public static $objInstance = false;

    /**
     * Initialize the object
     */
    public function __construct()
    {
        parent::__construct();
        $this->MobileDetect = new MobileDetect();
    }

    /**
     * Get static instance
     */
    public static function getInstance() {
        if (!self::$objInstance){
            self::$objInstance = new MobileDetect();
        }
        return self::$objInstance;
    }

    /**
     * Check the type of the device
     *
     * @return string    tablet|phone|computer
     */
    public static function getDeviceType()
    {
        return (self::isMobile() ? (self::isTablet() ? 'tablet' : 'phone') : 'computer');
    }

    /**
     * Check if the device is mobile.
     * Returns true if any type of mobile device detected, including special ones
     *
     * @return bool
     */
    public static function isMobile()
    {
        return self::getInstance()->MobileDetect->isMobile();
    }

    /**
     * Check if the device is a tablet.
     * Return true if any type of tablet device is detected.
     *
     * @return bool
     */
    public static function isTablet()
    {
        return self::getInstance()->MobileDetect->isTablet();
    }

}
