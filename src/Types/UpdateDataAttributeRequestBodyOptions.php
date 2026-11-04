<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateDataAttributeRequestBodyOptions extends JsonSerializableType
{
    /**
     * @var array<UpdateDataAttributeRequestBodyOptionsOptionsItem> $options Array of objects representing the options of the list, with `value` as the key and the option as the value. At least two options are required.
     */
    #[JsonProperty('options'), ArrayType([UpdateDataAttributeRequestBodyOptionsOptionsItem::class])]
    private array $options;

    /**
     * @param array{
     *   options: array<UpdateDataAttributeRequestBodyOptionsOptionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->options = $values['options'];
    }

    /**
     * @return array<UpdateDataAttributeRequestBodyOptionsOptionsItem>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<UpdateDataAttributeRequestBodyOptionsOptionsItem> $value
     */
    public function setOptions(array $value): self
    {
        $this->options = $value;
        $this->_setField('options');
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
