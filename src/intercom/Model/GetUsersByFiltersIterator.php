<?php
namespace Intercom\Model;

use Guzzle\Service\Resource\ResourceIterator;
use Intercom\Exception\IntercomException;

/**
 * Iterate over a get_users command
 */
class GetUsersByFiltersIterator extends ResourceIterator
{
    protected function sendRequest()
    {
        // Match up the page size on the iterator with the one on the request
        if ($this->pageSize) {
            $this->command->set('per_page', $this->pageSize);
        }

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

    public function setPageSize($pageSize)
    {
        if ($pageSize < 1 || $pageSize > 60) {
            throw new IntercomException('Page size on the iterator must be between 1 and 60');
        }

        return parent::setPageSize($pageSize);
    }
}