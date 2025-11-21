<?php

namespace Intercom\News\Items\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteNewsItemRequest extends JsonSerializableType
{
    /**
     * @var int $newsItemId The unique identifier for the news item which is given by Intercom.
     */
    private int $newsItemId;

    /**
     * @param array{
     *   newsItemId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newsItemId = $values['newsItemId'];
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
}
