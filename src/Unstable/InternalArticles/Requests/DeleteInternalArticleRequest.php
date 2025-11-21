<?php

namespace Intercom\Unstable\InternalArticles\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteInternalArticleRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier for the internal article which is given by Intercom.
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
