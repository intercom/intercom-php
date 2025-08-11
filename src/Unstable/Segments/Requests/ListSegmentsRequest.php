<?php

namespace Intercom\Unstable\Segments\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListSegmentsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeCount It includes the count of contacts that belong to each segment.
     */
    private ?bool $includeCount;

    /**
     * @param array{
     *   includeCount?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeCount = $values['includeCount'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getIncludeCount(): ?bool
    {
        return $this->includeCount;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeCount(?bool $value = null): self
    {
        $this->includeCount = $value;
        return $this;
    }
}
