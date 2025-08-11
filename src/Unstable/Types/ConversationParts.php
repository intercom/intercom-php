<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A list of Conversation Part objects for each part message in the conversation. This is only returned when Retrieving a Conversation, and ignored when Listing all Conversations. There is a limit of 500 parts.
 */
class ConversationParts extends JsonSerializableType
{
    /**
     * @var ?'conversation_part.list' $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<ConversationPart> $conversationParts A list of Conversation Part objects for each part message in the conversation. This is only returned when Retrieving a Conversation, and ignored when Listing all Conversations. There is a limit of 500 parts.
     */
    #[JsonProperty('conversation_parts'), ArrayType([ConversationPart::class])]
    private ?array $conversationParts;

    /**
     * @var ?int $totalCount
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @param array{
     *   type?: ?'conversation_part.list',
     *   conversationParts?: ?array<ConversationPart>,
     *   totalCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->conversationParts = $values['conversationParts'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
    }

    /**
     * @return ?'conversation_part.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'conversation_part.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<ConversationPart>
     */
    public function getConversationParts(): ?array
    {
        return $this->conversationParts;
    }

    /**
     * @param ?array<ConversationPart> $value
     */
    public function setConversationParts(?array $value = null): self
    {
        $this->conversationParts = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
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
