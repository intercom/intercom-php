<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Contains details about tags that were added or removed from a conversation for conversation part type <code>conversation_tags_updated</code>.
 */
class ConversationTagsUpdated extends JsonSerializableType
{
    /**
     * @var ?array<string> $tagsAdded Array of tag names that were added
     */
    #[JsonProperty('tags_added'), ArrayType(['string'])]
    private ?array $tagsAdded;

    /**
     * @var ?array<string> $tagsRemoved Array of tag names that were removed
     */
    #[JsonProperty('tags_removed'), ArrayType(['string'])]
    private ?array $tagsRemoved;

    /**
     * @param array{
     *   tagsAdded?: ?array<string>,
     *   tagsRemoved?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->tagsAdded = $values['tagsAdded'] ?? null;
        $this->tagsRemoved = $values['tagsRemoved'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getTagsAdded(): ?array
    {
        return $this->tagsAdded;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTagsAdded(?array $value = null): self
    {
        $this->tagsAdded = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTagsRemoved(): ?array
    {
        return $this->tagsRemoved;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTagsRemoved(?array $value = null): self
    {
        $this->tagsRemoved = $value;
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
