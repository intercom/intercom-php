<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A list of handling events for a conversation
 */
class HandlingEventList extends JsonSerializableType
{
    /**
     * @var ?array<HandlingEvent> $handlingEvents Array of handling events
     */
    #[JsonProperty('handling_events'), ArrayType([HandlingEvent::class])]
    private ?array $handlingEvents;

    /**
     * @param array{
     *   handlingEvents?: ?array<HandlingEvent>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->handlingEvents = $values['handlingEvents'] ?? null;
    }

    /**
     * @return ?array<HandlingEvent>
     */
    public function getHandlingEvents(): ?array
    {
        return $this->handlingEvents;
    }

    /**
     * @param ?array<HandlingEvent> $value
     */
    public function setHandlingEvents(?array $value = null): self
    {
        $this->handlingEvents = $value;
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
