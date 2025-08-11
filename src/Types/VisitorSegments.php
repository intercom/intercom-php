<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class VisitorSegments extends JsonSerializableType
{
    /**
     * @var ?'segment.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<string> $segments
     */
    #[JsonProperty('segments'), ArrayType(['string'])]
    private ?array $segments;

    /**
     * @param array{
     *   type?: ?'segment.list',
     *   segments?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->segments = $values['segments'] ?? null;
    }

    /**
     * @return ?'segment.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'segment.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSegments(): ?array
    {
        return $this->segments;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSegments(?array $value = null): self
    {
        $this->segments = $value;
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
