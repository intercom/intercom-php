<?php
namespace Intercom\Model\Iterators;

use Guzzle\Service\Resource\ResourceIterator;
use Intercom\Exception\IntercomException as IntercomException;


abstract class AbstractPageIterator extends ResourceIterator
{
    /** @var int|null The total number of results this request has available */
    protected $totalResults;

    /** @var string|null The type of object the paginated call returns */
    protected $objectListType;

    protected function sendRequest()
    {
        // Match up the page size on the iterator with the one on the command
        if ($this->pageSize) {
            $this->command->set('per_page', $this->pageSize);
        }

        // If a next token is set, then add it to the command
        if ($this->nextToken) {
            $this->command->set('page', $this->nextToken);
        }

        // Execute the command and parse the result
        $result = $this->command->execute();

        // Parse the next token
        $this->nextToken = (isset($result['pages']['next'])) ? $result['pages']['page'] + 1 : false;

        // Set the total results
        $this->totalResults = $result['total_count'];

        return $result->get($this->getObjectKeyFromListType($result['type']));
    }

    /**
     * Sets the total number of results available from the API for this request
     *
     * @param int $totalResults
     */
    protected function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * Gets the total results available from the API for this request
     *
     * @return null|int The total results
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * Sets the number of results per page
     *
     * @param int $pageSize The requested page size
     * @return $this
     * @throws IntercomException If the page size is not between 1 and 60
     */
    public function setPageSize($pageSize)
    {
        if ($pageSize < 1 || $pageSize > 60) {
            throw new IntercomException('Page size on the iterator must be between 1 and 60');
        }

        return parent::setPageSize($pageSize);
    }

    /**
     * Gets the name of the key that contains the results in a paginated API response
     *
     * @param string $type The returned type
     * @return string
     * @throws IntercomException If the $type is unknown
     */
    protected function getObjectKeyFromListType($type)
    {
        switch ($type) {
            case 'company.list':
                return 'companies';
            case 'conversation.list':
                return 'conversations';
            case 'conversation.part.list':
                return 'parts';
            case 'segment.list':
                return 'segments';
            case 'tag.list':
                return 'tags';
            case 'user.list':
                return 'users';
            case 'contact.list':
                return 'contacts';
            default:
                throw new IntercomException("Unknown list type returned ({$type}). Unable to use iterator to paginate");
        }
    }
}

