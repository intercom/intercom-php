<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateDataAttributeRequestOptions extends JsonSerializableType
{
    /**
     * @var array<UpdateDataAttributeRequestOptionsOptionsItem> $options Array of objects representing the options of the list, with `value` as the key and the option as the value. At least two options are required.
     */
    #[JsonProperty('options'), ArrayType([UpdateDataAttributeRequestOptionsOptionsItem::class])]
    private array $options;

    /**
     * @param array{
     *   options: array<UpdateDataAttributeRequestOptionsOptionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->options = $values['options'];
    }

    /**
     * @return array<UpdateDataAttributeRequestOptionsOptionsItem>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<UpdateDataAttributeRequestOptionsOptionsItem> $value
     */
    public function setOptions(array $value): self
    {
        $this->options = $value;
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
