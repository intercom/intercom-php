<?php

namespace Intercom\Events\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A list of event summaries for the user. Each event summary should contain the event name, the time the event occurred, and the number of times the event occurred. The event name should be a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
 */
class CreateDataEventSummariesRequestEventSummaries extends JsonSerializableType
{
    /**
     * @var ?string $eventName The name of the event that occurred. A good event name is typically a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
     */
    #[JsonProperty('event_name')]
    private ?string $eventName;

    /**
     * @var ?int $count The number of times the event occurred.
     */
    #[JsonProperty('count')]
    private ?int $count;

    /**
     * @var ?int $first The first time the event was sent
     */
    #[JsonProperty('first')]
    private ?int $first;

    /**
     * @var ?int $last The last time the event was sent
     */
    #[JsonProperty('last')]
    private ?int $last;

    /**
     * @param array{
     *   eventName?: ?string,
     *   count?: ?int,
     *   first?: ?int,
     *   last?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventName = $values['eventName'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->first = $values['first'] ?? null;
        $this->last = $values['last'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    /**
     * @param ?string $value
     */
    public function setEventName(?string $value = null): self
    {
        $this->eventName = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param ?int $value
     */
    public function setCount(?int $value = null): self
    {
        $this->count = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirst(): ?int
    {
        return $this->first;
    }

    /**
     * @param ?int $value
     */
    public function setFirst(?int $value = null): self
    {
        $this->first = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLast(): ?int
    {
        return $this->last;
    }

    /**
     * @param ?int $value
     */
    public function setLast(?int $value = null): self
    {
        $this->last = $value;
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
