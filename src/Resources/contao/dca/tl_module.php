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
 * Load tl_article data container
 */
\Contao\Controller::loadDataContainer('tl_article');
\Contao\System::loadLanguageFile('tl_article');

/**
 * Add operations
 */
array_insert($GLOBALS['TL_DCA']['tl_module']['list']['operations'], 4, [
    'toggleOnDesktop' => &$GLOBALS['TL_DCA']['tl_article']['list']['operations']['toggleOnDesktop'],
    'toggleOnMobile' => &$GLOBALS['TL_DCA']['tl_article']['list']['operations']['toggleOnMobile'],
]);

/**
 * Extend palettes
 */
foreach ($GLOBALS['TL_DCA']['tl_module']['palettes'] as $k => $v) {
    if (is_array($v)) {
        continue;
    }

    \Haste\Dca\PaletteManipulator::create()
        ->addField('hideOnDesktop', 'expert_legend', \Haste\Dca\PaletteManipulator::POSITION_APPEND)
        ->addField('hideOnMobile', 'expert_legend', \Haste\Dca\PaletteManipulator::POSITION_APPEND)
        ->applyToPalette($k, 'tl_module');
}

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['hideOnDesktop'] = &$GLOBALS['TL_DCA']['tl_article']['fields']['hideOnDesktop'];
$GLOBALS['TL_DCA']['tl_module']['fields']['hideOnMobile'] = &$GLOBALS['TL_DCA']['tl_article']['fields']['hideOnMobile'];
