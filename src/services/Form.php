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
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     HubspotFieldtype::$plugin->form->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $key = HubspotFieldtype::$plugin->getSettings()->hubspotApiKey;
        
        if (!$key) {
            return null;
        }

        $hubspot = \SevenShores\Hubspot\Factory::create($key);
        $response = $hubspot->forms()->all();
        $forms = [['label' => 'Select a Form', 'value' => '']];

        foreach ($response as $form) {
            $forms[] = [
                'value' => $form[0]->guid,
                'label' => $form[0]->name,
            ];
        }
        
        return $forms;
    }
}
