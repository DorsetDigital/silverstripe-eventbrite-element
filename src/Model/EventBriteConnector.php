<?php

namespace DorsetDigital\SilverStripeEventBrite\Model;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Injector\Injectable;

class EventBriteConnector
{
    use Injectable;
    use Configurable;

    /**
     * @config
     * @var string
     */
    private static $api_endpoint = 'https://www.eventbriteapi.com/v3';

    /**
     * @config
     * @var
     */
    private static $personal_token;

    public function __construct()
    {
        if ($this->config()->get('personal_token') == '') {
            throw new \Exception('A personal token must be provided.');
        }
    }

    public function getEventsList() {

    }
}
