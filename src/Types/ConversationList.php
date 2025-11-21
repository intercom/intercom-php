<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Conversations\Types\Conversation;
use Intercom\Core\Types\ArrayType;

/**
 * Conversations are how you can communicate with users in Intercom. They are created when a contact replies to an outbound message, or when one admin directly sends a message to a single contact.
 */
class ConversationList extends JsonSerializableType
{
    /**
     * @var ?'conversation.list' $type Always conversation.list
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Conversation> $conversations The list of conversation objects
     */
    #[JsonProperty('conversations'), ArrayType([Conversation::class])]
    private ?array $conversations;

    /**
     * @var ?int $totalCount A count of the total number of objects.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @param array{
     *   type?: ?'conversation.list',
     *   conversations?: ?array<Conversation>,
     *   totalCount?: ?int,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->conversations = $values['conversations'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return ?'conversation.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'conversation.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Conversation>
     */
    public function getConversations(): ?array
    {
        return $this->conversations;
    }

    /**
     * @param ?array<Conversation> $value
     */
    public function setConversations(?array $value = null): self
    {
        $this->conversations = $value;
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
     * @return ?CursorPages
     */
    public function getPages(): ?CursorPages
    {
        return $this->pages;
    }

    /**
     * @param ?CursorPages $value
     */
    public function setPages(?CursorPages $value = null): self
    {
        $this->pages = $value;
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
