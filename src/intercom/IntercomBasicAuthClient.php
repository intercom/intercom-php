<?php
namespace Intercom;

use Guzzle\Common\Collection;
use Guzzle\Common\Event;
use Guzzle\Service\Client;
use Guzzle\Http\Message\Request;
use Intercom\Exception\IntercomException;


class IntercomBasicAuthClient extends IntercomAbstractClient
{
    /** @var array The required config variables for this type of client */
    private static $required = ['app_id', 'api_key', 'headers', 'service_description'];

    /**
     * Creates a Basic Auth Client with the supplied configuration options
     *
     * @param array $config
     * @return Client|IntercomBasicAuthClient
     */
    public static function factory($config = [])
    {
        $default = [
            'service_description' => __DIR__ . '/Service/config/intercom.json',
            'headers' => [
                'Content-Type' => self::DEFAULT_CONTENT_TYPE,
                'Accept' => self::DEFAULT_ACCEPT_HEADER
            ]
        ];

        $config = Collection::fromConfig($config, $default, static::$required);
        $client = new self();

        $client->setDefaultOption('headers', $config->get('headers'));

        $client->setDefaultOption(
            'auth',
            [
                $config->get('app_id'),
                $config->get('api_key'),
                'Basic'
            ]
        );

        $client->setDescription(static::getServiceDescriptionFromFile($config->get('service_description')));

        $client->getEventDispatcher()->addListener('request.error', function(Event $event) {
            // Stop other events from firing when you override 401 responses
            $event->stopPropagation();

            if ($event['response']->getStatusCode() > 400 && $event['response']->getStatusCode() < 600) {
                $e = IntercomException::factory($event['request'], $event['response']);
                $event['request']->setState(Request::STATE_ERROR, array('exception' => $e) + $event->toArray());
                throw $e;
            }
        });

        return $client;
    }
}

