<?php
/**
 * Hubspot Fieldtype plugin for Craft CMS 3.x
 *
 * This plugin allows users to select Hubspot Forms from their Hubspot Marketing account and allows template developers to easy embed Hubspot forms.
 *
 * @link      gsumpster.com
 * @copyright Copyright (c) 2022 George Sumpster
 */

namespace gsumpster\hubspotfieldtypetests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use gsumpster\hubspotfieldtype\HubspotFieldtype;

/**
 * ExampleUnitTest
 *
 *
 * @author    George Sumpster
 * @package   HubspotFieldtype
 * @since     0.1.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            HubspotFieldtype::class,
            HubspotFieldtype::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
