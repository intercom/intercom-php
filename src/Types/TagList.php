<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tags\Types\Tag;
use Intercom\Core\Types\ArrayType;

/**
 * A list of tags objects in the workspace.
 */
class TagList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Tag> $data A list of tags objects associated with the workspace .
     */
    #[JsonProperty('data'), ArrayType([Tag::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<Tag>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Tag>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Tag> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
