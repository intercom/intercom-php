<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * This will return a summary of a data event for the App.
 */
class DataEventSummaryItem extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the event
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $first The first time the event was sent
     */
    #[JsonProperty('first')]
    private ?string $first;

    /**
     * @var ?string $last The last time the event was sent
     */
    #[JsonProperty('last')]
    private ?string $last;

    /**
     * @var ?int $count The number of times the event was sent
     */
    #[JsonProperty('count')]
    private ?int $count;

    /**
     * @var ?string $description The description of the event
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @param array{
     *   name?: ?string,
     *   first?: ?string,
     *   last?: ?string,
     *   count?: ?int,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->first = $values['first'] ?? null;
        $this->last = $values['last'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->description = $values['description'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFirst(): ?string
    {
        return $this->first;
    }

    /**
     * @param ?string $value
     */
    public function setFirst(?string $value = null): self
    {
        $this->first = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLast(): ?string
    {
        return $this->last;
    }

    /**
     * @param ?string $value
     */
    public function setLast(?string $value = null): self
    {
        $this->last = $value;
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
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
