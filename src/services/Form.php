<?php
/**
 * Hubspot Fieldtype plugin for Craft CMS 3.x
 *
 * This plugin allows users to select Hubspot Forms from their Hubspot Marketing account and allows template developers to easy embed Hubspot forms.
 *
 * @link      gsumpster.com
 * @copyright Copyright (c) 2022 George Sumpster
 */

namespace gsumpster\hubspotfieldtype\services;

use gsumpster\hubspotfieldtype\HubspotFieldtype;
use Craft;
use craft\base\Component;

/**
 * Form Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    George Sumpster
 * @package   HubspotFieldtype
 * @since     0.1.0
 */
class Form extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function returns an array all of the forms in the Hubspot account.
     * 
     * @return array
     */
    public function getAllForms()
    {
        $key = HubspotFieldtype::$plugin->getSettings()->hubspotApiKey;
        
        if (!$key) {
            return null;
        }

        $hubspot = \SevenShores\Hubspot\Factory::create($key);
        $response = $hubspot->forms()->all();
        $forms = [];

        foreach ($response->data as $form) {
            $forms[] = $form;
        }
        
        return $forms;
    }

    /**
     * This function returns a single form, given an guid.
     * 
     * @return array
     */
    public function getForm($guid)
    {
        $key = HubspotFieldtype::$plugin->getSettings()->hubspotApiKey;
        
        if (!$key) {
            return null;
        }

        $hubspot = \SevenShores\Hubspot\Factory::create($key);
        $response = $hubspot->forms()->getById($guid);
        return $response;
    }
}
