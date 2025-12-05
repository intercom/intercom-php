<?php

namespace Intercom\News\Items\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\NewsItemRequest;

class UpdateNewsItemRequest extends JsonSerializableType
{
    /**
     * @var int $newsItemId The unique identifier for the news item which is given by Intercom.
     */
    private int $newsItemId;

    /**
     * @var NewsItemRequest $body
     */
    private NewsItemRequest $body;

    /**
     * @param array{
     *   newsItemId: int,
     *   body: NewsItemRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newsItemId = $values['newsItemId'];
        $this->body = $values['body'];
    }

    /**
     * @return int
     */
    public function getNewsItemId(): int
    {
        return $this->newsItemId;
    }

    /**
     * @param int $value
     */
    public function setNewsItemId(int $value): self
    {
        $this->newsItemId = $value;
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
