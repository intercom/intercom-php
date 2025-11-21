<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * deleted custom object instance object
 */
class CustomObjectInstanceDeleted extends JsonSerializableType
{
    /**
     * @var ?string $object The unique identifier of the Custom Object type that defines the structure of the Custom Object instance.
     */
    #[JsonProperty('object')]
    private ?string $object;

    /**
     * @var ?string $id The Intercom defined id representing the Custom Object instance.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?bool $deleted Whether the Custom Object instance is deleted or not.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @param array{
     *   object?: ?string,
     *   id?: ?string,
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->object = $values['object'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getObject(): ?string
    {
        return $this->object;
    }

    /**
     * @param ?string $value
     */
    public function setObject(?string $value = null): self
    {
        $this->object = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param ?bool $value
     */
    public function setDeleted(?bool $value = null): self
    {
        $this->deleted = $value;
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
