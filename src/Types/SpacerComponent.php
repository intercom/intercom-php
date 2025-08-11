<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A spacer component is used to create empty space between components.
 */
class SpacerComponent extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?value-of<SpacerComponentSize> $size The amount of space between components. Default is `s`.
     */
    #[JsonProperty('size')]
    private ?string $size;

    /**
     * @param array{
     *   id?: ?string,
     *   size?: ?value-of<SpacerComponentSize>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->size = $values['size'] ?? null;
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
     * @return ?value-of<SpacerComponentSize>
     */
    public function getSize(): ?string
    {
        return $this->size;
    }

    /**
     * @param ?value-of<SpacerComponentSize> $value
     */
    public function setSize(?string $value = null): self
    {
        $this->size = $value;
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
