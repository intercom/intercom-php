<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Segments\Types\Segment;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of Segment Objects. The result may also have a pages object if the response is paginated.
 */
class SegmentList extends JsonSerializableType
{
    /**
     * @var ?'segment.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Segment> $segments A list of Segment objects
     */
    #[JsonProperty('segments'), ArrayType([Segment::class])]
    private ?array $segments;

    /**
     * @var ?array<string, mixed> $pages A pagination object, which may be empty, indicating no further pages to fetch.
     */
    #[JsonProperty('pages'), ArrayType(['string' => 'mixed'])]
    private ?array $pages;

    /**
     * @param array{
     *   type?: ?'segment.list',
     *   segments?: ?array<Segment>,
     *   pages?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->pages = $values['pages'] ?? null;
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
     * @return ?array<Segment>
     */
    public function getSegments(): ?array
    {
        return $this->segments;
    }

    /**
     * @param ?array<Segment> $value
     */
    public function setSegments(?array $value = null): self
    {
        $this->segments = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getPages(): ?array
    {
        return $this->pages;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setPages(?array $value = null): self
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
