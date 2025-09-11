<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\DataEvents\Types\DataEvent;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of data events for the App.
 */
class DataEventList extends JsonSerializableType
{
    /**
     * @var ?'event.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<DataEvent> $events A list of data events
     */
    #[JsonProperty('events'), ArrayType([DataEvent::class])]
    private ?array $events;

    /**
     * @var ?DataEventListPages $pages Pagination
     */
    #[JsonProperty('pages')]
    private ?DataEventListPages $pages;

    /**
     * @param array{
     *   type?: ?'event.list',
     *   events?: ?array<DataEvent>,
     *   pages?: ?DataEventListPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return ?'event.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'event.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<DataEvent>
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param ?array<DataEvent> $value
     */
    public function setEvents(?array $value = null): self
    {
        $this->events = $value;
        return $this;
    }

    /**
     * @return ?DataEventListPages
     */
    public function getPages(): ?DataEventListPages
    {
        return $this->pages;
    }

    /**
     * @param ?DataEventListPages $value
     */
    public function setPages(?DataEventListPages $value = null): self
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
