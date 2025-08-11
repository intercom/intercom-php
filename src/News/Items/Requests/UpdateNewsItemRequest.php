<?php

namespace Intercom\News\Items\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\NewsItemRequest;

class UpdateNewsItemRequest extends JsonSerializableType
{
    /**
     * @var string $newsItemId The unique identifier for the news item which is given by Intercom.
     */
    private string $newsItemId;

    /**
     * @var NewsItemRequest $body
     */
    private NewsItemRequest $body;

    /**
     * @param array{
     *   newsItemId: string,
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
     * @return string
     */
    public function getNewsItemId(): string
    {
        return $this->newsItemId;
    }

    /**
     * @param string $value
     */
    public function setNewsItemId(string $value): self
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
