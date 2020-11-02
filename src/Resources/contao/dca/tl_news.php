<?php

/**
 * mobilecontent extension for Contao Open Source CMS
 *
 * @package ContaoMobilecontentBundle
 * @author  Kamil Kuzminski <https://github.com/qzminski>
 * @author  derhaeuptling <https://derhaeuptling.com>
 * @author  Martin Schwenzer <mail@derhaeuptling.com>
 * @author  Marcel Mathias Nolte
 * @website	https://github.com/marcel-mathias-nolte
 * @license LGPL
 */

/**
 * Load tl_content data container
 */
\Contao\Controller::loadDataContainer('tl_content');
\Contao\System::loadLanguageFile('tl_content');

/**
 * Extend palettes
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'mobileImage';
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'mobileImageCustomSize';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['mobileImage'] = 'mobileImageSrc,mobileImageCustomSize';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['mobileImageCustomSize'] = 'mobileImageSize';

if (isset($GLOBALS['TL_DCA']['tl_news']['subpalettes']['addImage'])) {
    \Haste\Dca\PaletteManipulator::create()
        ->addField('mobileImage', 'singleSRC', \Haste\Dca\PaletteManipulator::POSITION_AFTER)
        ->applyToSubpalette('addImage', 'tl_news');
}

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['mobileImage'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['mobileImage'];
$GLOBALS['TL_DCA']['tl_news']['fields']['mobileImageSrc'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['mobileImageSrc'];
$GLOBALS['TL_DCA']['tl_news']['fields']['mobileImageCustomSize'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['mobileImageCustomSize'];
$GLOBALS['TL_DCA']['tl_news']['fields']['mobileImageSize'] = &$GLOBALS['TL_DCA']['tl_content']['fields']['mobileImageSize'];
