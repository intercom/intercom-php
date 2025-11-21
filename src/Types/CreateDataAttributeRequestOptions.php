<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class CreateDataAttributeRequestOptions extends JsonSerializableType
{
    /**
     * @var ?'options' $dataType
     */
    #[JsonProperty('data_type')]
    private ?string $dataType;

    /**
     * @var array<CreateDataAttributeRequestOptionsOptionsItem> $options Array of objects representing the options of the list, with `value` as the key and the option as the value. At least two options are required.
     */
    #[JsonProperty('options'), ArrayType([CreateDataAttributeRequestOptionsOptionsItem::class])]
    private array $options;

    /**
     * @param array{
     *   options: array<CreateDataAttributeRequestOptionsOptionsItem>,
     *   dataType?: ?'options',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dataType = $values['dataType'] ?? null;
        $this->options = $values['options'];
    }

    /**
     * @return ?'options'
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    /**
     * @param ?'options' $value
     */
    public function setDataType(?string $value = null): self
    {
        $this->dataType = $value;
        return $this;
    }

    /**
     * @return array<CreateDataAttributeRequestOptionsOptionsItem>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<CreateDataAttributeRequestOptionsOptionsItem> $value
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
