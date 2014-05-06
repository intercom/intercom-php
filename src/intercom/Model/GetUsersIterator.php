<?php
namespace Intercom\Model;

use Guzzle\Service\Resource\ResourceIterator;

/**
 * Iterate over a get_users command
 */
class GetUsersIterator extends ResourceIterator
{
    protected function sendRequest()
    {
        // If a next token is set, then add it to the command
        if ($this->nextToken) {
            $this->command->set('page', $this->nextToken);
        }

        echo "... Going to the API for more results" . PHP_EOL;

        // Execute the command and parse the result
        $result = $this->command->execute();

        // Parse the next token
        $this->nextToken = (isset($result['next_page'])) ? $result['next_page'] : false;

        return $result->get('users');
    }
}