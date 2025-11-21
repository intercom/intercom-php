<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\DataAttributes\Types\DataAttribute;
use Intercom\Core\Types\ArrayType;

/**
 * A list of all data attributes belonging to a workspace for contacts, companies or conversations.
 */
class DataAttributeList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<DataAttribute> $data A list of data attributes
     */
    #[JsonProperty('data'), ArrayType([DataAttribute::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<DataAttribute>,
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
     * @return ?array<DataAttribute>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<DataAttribute> $value
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
