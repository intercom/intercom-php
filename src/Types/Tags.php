<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tags\Types\Tag;
use Intercom\Core\Types\ArrayType;

/**
 * A list of tags objects associated with a conversation
 */
class Tags extends JsonSerializableType
{
    /**
     * @var 'tag.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<Tag> $tags A list of tags objects associated with the conversation.
     */
    #[JsonProperty('tags'), ArrayType([Tag::class])]
    private array $tags;

    /**
     * @param array{
     *   type: 'tag.list',
     *   tags: array<Tag>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->tags = $values['tags'];
    }

    /**
     * @return 'tag.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'tag.list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<Tag>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array<Tag> $value
     */
    public function setTags(array $value): self
    {
        $this->tags = $value;
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
