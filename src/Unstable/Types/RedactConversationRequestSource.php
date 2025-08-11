<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to redact a conversation source
 */
class RedactConversationRequestSource extends JsonSerializableType
{
    /**
     * @var string $conversationId The id of the conversation.
     */
    #[JsonProperty('conversation_id')]
    private string $conversationId;

    /**
     * @var string $sourceId The id of the source.
     */
    #[JsonProperty('source_id')]
    private string $sourceId;

    /**
     * @param array{
     *   conversationId: string,
     *   sourceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->sourceId = $values['sourceId'];
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
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @param string $value
     */
    public function setSourceId(string $value): self
    {
        $this->sourceId = $value;
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
