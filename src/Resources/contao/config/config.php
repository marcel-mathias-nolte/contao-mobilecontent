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
 * Hooks
 */
$GLOBALS['TL_HOOKS']['isVisibleElement'][] = ['MarcelMathiasNolte\ContaoMobilecontentBundle\EventListener\ElementListener', 'onIsVisibleElement'];
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = ['MarcelMathiasNolte\ContaoMobilecontentBundle\EventListener\InsertTagsListener', 'onReplace'];

if (!is_array($GLOBALS['TL_HOOKS']['parseTemplate'])) {
    $GLOBALS['TL_HOOKS']['parseTemplate'] = [];
}

array_unshift($GLOBALS['TL_HOOKS']['parseTemplate'], ['MarcelMathiasNolte\ContaoMobilecontentBundle\EventListener\TemplateListener', 'onParse']);

$GLOBALS['TL_HOOKS']['generatePage'][]      = array('MarcelMathiasNolte\ContaoMobilecontentBundle\Hooks', 'insertInsertTagMD');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('MarcelMathiasNolte\ContaoMobilecontentBundle\Hooks', 'mobiledetectionReplaceInsertTags');
