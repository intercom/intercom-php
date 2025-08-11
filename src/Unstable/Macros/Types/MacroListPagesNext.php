<?php

namespace Intercom\Unstable\Macros\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Cursor for the next page
 */
class MacroListPagesNext extends JsonSerializableType
{
    /**
     * @var ?string $startingAfter Base64-encoded cursor containing [updated_at, id] for pagination
     */
    #[JsonProperty('starting_after')]
    private ?string $startingAfter;

    /**
     * @param array{
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startingAfter = $values['startingAfter'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStartingAfter(): ?string
    {
        return $this->startingAfter;
    }

    /**
     * @param ?string $value
     */
    public function setStartingAfter(?string $value = null): self
    {
        $this->startingAfter = $value;
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
