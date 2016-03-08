<?php
namespace Intercom;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;

class IntercomClientTokenAuthClient extends IntercomAbstractClient
{
    /** @var array The required config variables for this type of client */
    private static $required = [
        'app_id',
        'client_uuid',
        'client_key',
        'headers',
        'service_description'
    ];

    /**
     * Creates a client token auth client with the supplied configuration options
     *
     * @param array $config
     * @return Client|IntercomBasicAuthClient
     */
    public static function factory($config = [])
    {
        $client = new self();

        $config = Collection::fromConfig($config, $client->getDefaultConfig(), static::$required);

        $client->configure($config);

        $client->setBasicAuth($config->get('client_uuid'), $config->get('client_key'));

        $client->setUserAgent('intercom-php/1.5.0', true);

        $client->setDefaultOption('query/app_id', $config->get('app_id'));

        return $client;
    }
}
