<?php

namespace Intercom\Companies\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The list of tags associated with the company
 */
class CompanyTags extends JsonSerializableType
{
    /**
     * @var ?'tag.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<mixed> $tags
     */
    #[JsonProperty('tags'), ArrayType(['mixed'])]
    private ?array $tags;

    /**
     * @param array{
     *   type?: ?'tag.list',
     *   tags?: ?array<mixed>,
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
     * @return ?array<mixed>
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param ?array<mixed> $value
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
