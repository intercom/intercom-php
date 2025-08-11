<?php

namespace Intercom\News\Items\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteNewsItemRequest extends JsonSerializableType
{
    /**
     * @var string $newsItemId The unique identifier for the news item which is given by Intercom.
     */
    private string $newsItemId;

    /**
     * @param array{
     *   newsItemId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newsItemId = $values['newsItemId'];
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
}
