<?php
/**
 * Hubspot Fieldtype plugin for Craft CMS 3.x
 *
 * This plugin allows users to select Hubspot Forms from their Hubspot Marketing account and allows template developers to easy embed Hubspot forms.
 *
 * @link      gsumpster.com
 * @copyright Copyright (c) 2022 George Sumpster
 */

namespace gsumpster\hubspotfieldtype\models;

use gsumpster\hubspotfieldtype\HubspotFieldtype;

use Craft;
use craft\base\Model;

/**
 * HubspotFieldtype Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    George Sumpster
 * @package   HubspotFieldtype
 * @since     0.1.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $hubspotApiKey = '';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['hubspotApiKey', 'string'],
        ];
    }
}
