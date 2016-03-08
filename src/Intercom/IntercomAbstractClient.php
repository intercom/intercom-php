<?php
namespace Intercom;

use InvalidArgumentException;
use Guzzle\Service\Client;
use Guzzle\Common\Event;
use Guzzle\Http\Message\Request;
use Guzzle\Service\Description\ServiceDescription;
use Intercom\Exception\IntercomException;
use Guzzle\Common\Collection;

abstract class IntercomAbstractClient extends Client
{
    /** @var string */
    const DEFAULT_CONTENT_TYPE = 'application/json';

    /** @var string */
    const DEFAULT_ACCEPT_HEADER = 'application/json';

    const USER_AGENT = 'intercom-php/1.5.0';


    /**
     * Configures the client by setting the appropriate headers, service description and error handling
     *
     * @param Collection $config
     */
    protected function configure($config)
    {
        $this->setDefaultOption('headers', $config->get('headers'));
        $this->setDescription($this->getServiceDescriptionFromFile($config->get('service_description')));
        $this->setErrorHandler();
    }

    /**
     * Loads the service description from the service description file
     *
     * @param string $description_file The service description file
     * @return ServiceDescription
     * @throws InvalidArgumentException If the description file doesn't exist or cannot be read
     */
    public function getServiceDescriptionFromFile($description_file)
    {
        if (!file_exists($description_file) || !is_readable($description_file)) {
            throw new InvalidArgumentException('Unable to read API definition schema');
        }

        return ServiceDescription::factory($description_file);
    }

    /**
     * Overrides the error handling in Guzzle so that when errors are encountered we throw
     * Intercom errors, not Guzzle ones.
     *
     */
    private function setErrorHandler()
    {
        $this->getEventDispatcher()->addListener(
            'request.error',
            function (Event $event) {
                // Stop other events from firing when you override 401 responses
                $event->stopPropagation();

                if ($event['response']->getStatusCode() >= 400 && $event['response']->getStatusCode() < 600) {
                    $e = IntercomException::factory($event['request'], $event['response']);
                    $event['request']->setState(Request::STATE_ERROR, array('exception' => $e) + $event->toArray());
                    throw $e;
                }
            }
        );
    }

    /**
     * Sets the username and password for basic auth on the client
     *
     * @param string $user
     * @param string $password
     */
    public function setBasicAuth($user, $password)
    {
        $this->setDefaultOption(
            'auth',
            [
                $user,
                $password,
                'Basic'
            ]
        );
    }

    /**
     * Gets the default configuration options for the client
     *
     * @return array
     */
    public static function getDefaultConfig()
    {
        return [
            'service_description' => __DIR__ . '/Service/config/intercom.json',
            'headers' => [
                'Content-Type' => self::DEFAULT_CONTENT_TYPE,
                'Accept' => self::DEFAULT_ACCEPT_HEADER,
                'User-Agent' => self::USER_AGENT
            ]
        ];
    }

    /**
     * A wrapper around two API calls to emulate the ping call from the other APIs
     *
     * @param array $user_details The user details
     * @return mixed
     */
    public function ping($user_details)
    {
        $this->saveUser($user_details);
        return $this->getUnreadUserConversations($user_details);
    }
}
