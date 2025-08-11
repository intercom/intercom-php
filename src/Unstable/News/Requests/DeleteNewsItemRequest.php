<?php

namespace Intercom\Unstable\News\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteNewsItemRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier for the news item which is given by Intercom.
     */
    private int $id;

    /**
     * @param array{
     *   id: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
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
}
