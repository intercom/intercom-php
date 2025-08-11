<?php

namespace Intercom\News\Feeds\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListNewsFeedItemsRequest extends JsonSerializableType
{
    /**
     * @var string $newsfeedId The unique identifier for the news feed item which is given by Intercom.
     */
    private string $newsfeedId;

    /**
     * @param array{
     *   newsfeedId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newsfeedId = $values['newsfeedId'];
    }

    /**
     * @return string
     */
    public function getNewsfeedId(): string
    {
        return $this->newsfeedId;
    }

    /**
     * @param string $value
     */
    public function setNewsfeedId(string $value): self
    {
        $this->newsfeedId = $value;
        return $this;
    }
}
