<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomChannelAttribute extends JsonSerializableType
{
    /**
     * @var string $id Identifier for the attribute being collected.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $value Value provided by the user for the attribute.
     */
    #[JsonProperty('value')]
    private string $value;

    /**
     * @param array{
     *   id: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
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
