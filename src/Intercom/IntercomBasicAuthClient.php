<?php
namespace Intercom;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;

class IntercomBasicAuthClient extends IntercomAbstractClient
{
    /** @var array The required config variables for this type of client */
    private static $required = [
        'app_id',
        'api_key',
        'headers',
        'service_description'
    ];

    /**
     * Creates a basic auth client with the supplied configuration options
     *
     * @param array $config
     * @return Client|IntercomBasicAuthClient
     */
    public static function factory($config = [])
    {
        $client = new self();

        $config = Collection::fromConfig($config, $client->getDefaultConfig(), static::$required);

        $client->configure($config);

        $client->setBasicAuth($config->get('app_id'), $config->get('api_key'));

        $client->setUserAgent('intercom-php/1.5.0', true);

        return $client;
    }

    public static function filterEmptyList($possiblyEmpty)
    {
      if (empty($possiblyEmpty)) {
        return NULL;
      } else {
        return $possiblyEmpty;
      }
    }
}
