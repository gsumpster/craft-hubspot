<?php
/**
 * Hubspot Fieldtype plugin for Craft CMS 3.x
 *
 * This plugin allows users to select Hubspot Forms from their Hubspot Marketing account and allows template developers to easy embed Hubspot forms.
 *
 * @link      gsumpster.com
 * @copyright Copyright (c) 2022 George Sumpster
 */

namespace gsumpster\hubspotfieldtype\assetbundles\formfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * FormFieldAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    George Sumpster
 * @package   HubspotFieldtype
 * @since     0.1.0
 */
class FormFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@gsumpster/hubspotfieldtype/assetbundles/formfield/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/Form.js',
        ];

        $this->css = [
            'css/Form.css',
        ];

        parent::init();
    }
}
