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

namespace MarcelMathiasNolte\ContaoMobilecontentBundle\Tests;

use PHPUnit\Framework\TestCase;

class ContaoMobilecontentBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new \MarcelMathiasNolte\ContaoMobilecontentBundle\ContaoMobilecontentBundle();

        $this->assertInstanceOf('MarcelMathiasNolte\ContaoMobilecontentBundle\ContaoMobilecontentBundle', $bundle);
    }
}
