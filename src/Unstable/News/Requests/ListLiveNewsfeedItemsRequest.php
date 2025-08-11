<?php

namespace Intercom\Unstable\News\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListLiveNewsfeedItemsRequest extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the news feed item which is given by Intercom.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }
}
