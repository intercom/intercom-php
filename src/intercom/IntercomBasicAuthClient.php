<?php
namespace Intercom;

use InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class IntercomBasicAuthClient extends Client
{
    /**
     * @todo: Remove hardcoded constant, discuss with platform how to obtain a service definition
     */
    const DESCRIPTION_FILE = 'src/intercom/Service/config/intercom.json';

    /**
     * Creates a Basic Auth Client with the supplied configuration options
     *
     * @param array $config
     * @return Client|IntercomBasicAuthClient
     */
    public static function factory($config = [])
    {
        $default = [];
        $required = ['app_id', 'api_key'];
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

        $client->setDescription(static::getServiceDescriptionFromFile(self::DESCRIPTION_FILE));

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

