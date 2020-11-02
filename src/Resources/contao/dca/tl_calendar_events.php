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
$GLOBALS['TL_DCA']['tl_calendar_events']['palettes']['__selector__'][] = 'mobileImage';
$GLOBALS['TL_DCA']['tl_calendar_events']['palettes']['__selector__'][] = 'mobileImageCustomSize';
$GLOBALS['TL_DCA']['tl_calendar_events']['subpalettes']['mobileImage'] = 'mobileImageSrc,mobileImageCustomSize';
$GLOBALS['TL_DCA']['tl_calendar_events']['subpalettes']['mobileImageCustomSize'] = 'mobileImageSize';

if (isset($GLOBALS['TL_DCA']['tl_calendar_events']['subpalettes']['addImage'])) {
    \Haste\Dca\PaletteManipulator::create()
        ->addField('mobileImage', 'singleSRC', \Haste\Dca\PaletteManipulator::POSITION_AFTER)
        ->applyToSubpalette('addImage', 'tl_calendar_events');
}

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['mobileImage'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mobileImage'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['mobileImageSrc'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mobileImageSrc'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => [
        'filesOnly' => true,
        'fieldType' => 'radio',
        'mandatory' => true,
        'extensions' => Config::get('validImageTypes'),
        'tl_class' => 'clr',
    ],
    'sql' => "binary(16) NULL",
];

$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['mobileImageCustomSize'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mobileImageCustomSize'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['mobileImageSize'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['mobileImageSize'],
    'exclude' => true,
    'inputType' => 'imageSize',
    'options' => System::getImageSizes(),
    'reference' => &$GLOBALS['TL_LANG']['MSC'],
    'eval' => [
        'rgxp' => 'natural',
        'includeBlankOption' => true,
        'nospace' => true,
        'helpwizard' => true,
        'tl_class' => 'clr',
    ],
    'sql' => "varchar(64) NOT NULL default ''",
];
