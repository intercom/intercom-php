<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A divider component is used to separate components with a line.
 */
class DividerComponent extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'none' $bottomMargin Disables a component's margin-bottom of 10px.
     */
    #[JsonProperty('bottom_margin')]
    private ?string $bottomMargin;

    /**
     * @param array{
     *   id?: ?string,
     *   bottomMargin?: ?'none',
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->bottomMargin = $values['bottomMargin'] ?? null;
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
     * @return ?'none'
     */
    public function getBottomMargin(): ?string
    {
        return $this->bottomMargin;
    }

    /**
     * @param ?'none' $value
     */
    public function setBottomMargin(?string $value = null): self
    {
        $this->bottomMargin = $value;
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
