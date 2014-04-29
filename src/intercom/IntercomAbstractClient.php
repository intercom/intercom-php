<?php
namespace Intercom;

use InvalidArgumentException;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

abstract class IntercomAbstractClient extends Client
{
    /** @var string */
    const DEFAULT_CONTENT_TYPE = 'application/json';

    /** @var string */
    const DEFAULT_ACCEPT_HEADER = 'application/vnd.intercom.3+json';

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
     * A wrapper around two API calls to emulate the ping call from the other APIs
     *
     * @param array $user_details The user details
     * @return mixed
     */
    public function ping($user_details)
    {
        $user = $this->saveUser($user_details);
        return $this->getUnreadUserConversations($user_details);
    }
}