<?php
namespace Intercom;

use InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class IntercomBasicAuthClient extends Client
{
    /**
     * Creates a Basic Auth Client with the supplied configuration options
     *
     * @param array $config
     * @return Client|IntercomBasicAuthClient
     */
    public static function factory($config = [])
    {
        $default = ['service_description' => __DIR__ . '/Service/config/intercom.json'];
        $required = ['app_id', 'api_key', 'service_description'];
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self();

        // v3 Headers
        $client->setDefaultOption('headers', [
            'Content-Type' => 'application/json',
            'Accept' => 'application/vnd.intercom.3+json'
        ]);

        $client->setDefaultOption('auth', [
                $config->get('app_id'),
                $config->get('api_key'),
                'Basic'
        ]);

        $client->setDescription(static::getServiceDescriptionFromFile($config->get('service_description')));

        return $client;
    }

    /**
     * Loads the service description from the service description file
     *
     * @param string $description_file The service description file
     * @return ServiceDescription
     * @throws InvalidArgumentException If the description file doesn't exist or cannot be read
     */
    public function getServiceDescriptionFromFile($description_file) {
        if (!file_exists($description_file) || !is_readable($description_file)) {
            throw new InvalidArgumentException('Unable to read API definition schema');
        }

        return ServiceDescription::factory($description_file);
    }
}

