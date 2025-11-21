<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteConversationRequest extends JsonSerializableType
{
    /**
     * @var int $conversationId id
     */
    private int $conversationId;

    /**
     * @param array{
     *   conversationId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
    }

    /**
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    /**
     * @param int $value
     */
    public function setConversationId(int $value): self
    {
        $this->conversationId = $value;
        return $this;
    }
}
