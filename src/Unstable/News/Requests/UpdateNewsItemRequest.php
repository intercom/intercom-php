<?php

namespace Intercom\Unstable\News\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Types\NewsItemRequest;

class UpdateNewsItemRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier for the news item which is given by Intercom.
     */
    private int $id;

    /**
     * @var NewsItemRequest $body
     */
    private NewsItemRequest $body;

    /**
     * @param array{
     *   id: int,
     *   body: NewsItemRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->body = $values['body'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return NewsItemRequest
     */
    public function getBody(): NewsItemRequest
    {
        return $this->body;
    }

    /**
     * @param NewsItemRequest $value
     */
    public function setBody(NewsItemRequest $value): self
    {
        $this->body = $value;
        return $this;
    }
}
