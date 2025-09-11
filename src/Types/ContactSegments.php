<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Segments\Types\Segment;
use Intercom\Core\Types\ArrayType;

/**
 * A list of segments objects attached to a specific contact.
 */
class ContactSegments extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Segment> $data Segment objects associated with the contact.
     */
    #[JsonProperty('data'), ArrayType([Segment::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<Segment>,
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
     * @return ?array<Segment>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Segment> $value
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
