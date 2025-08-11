<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class AutoAssignConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The identifier for the conversation as given by Intercom.
     */
    private string $conversationId;

    /**
     * @param array{
     *   conversationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
    }

    /**
     * @return string
     */
    public function getConversationId(): string
    {
        return $this->conversationId;
    }

    /**
     * @param string $value
     */
    public function setConversationId(string $value): self
    {
        $this->conversationId = $value;
        return $this;
    }
}
