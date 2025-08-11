<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteConversationRequest extends JsonSerializableType
{
    /**
     * @var int $id id
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
