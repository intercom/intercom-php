<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to redact a conversation part
 */
class RedactConversationRequestConversationPart extends JsonSerializableType
{
    /**
     * @var string $conversationId The id of the conversation.
     */
    #[JsonProperty('conversation_id')]
    private string $conversationId;

    /**
     * @var string $conversationPartId The id of the conversation_part.
     */
    #[JsonProperty('conversation_part_id')]
    private string $conversationPartId;

    /**
     * @param array{
     *   conversationId: string,
     *   conversationPartId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->conversationPartId = $values['conversationPartId'];
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

    /**
     * @return string
     */
    public function getConversationPartId(): string
    {
        return $this->conversationPartId;
    }

    /**
     * @param string $value
     */
    public function setConversationPartId(string $value): self
    {
        $this->conversationPartId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
