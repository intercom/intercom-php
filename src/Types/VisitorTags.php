<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class VisitorTags extends JsonSerializableType
{
    /**
     * @var ?'tag.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<VisitorTagsTagsItem> $tags
     */
    #[JsonProperty('tags'), ArrayType([VisitorTagsTagsItem::class])]
    private ?array $tags;

    /**
     * @param array{
     *   type?: ?'tag.list',
     *   tags?: ?array<VisitorTagsTagsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return ?'tag.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'tag.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<VisitorTagsTagsItem>
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param ?array<VisitorTagsTagsItem> $value
     */
    public function setTags(?array $value = null): self
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
