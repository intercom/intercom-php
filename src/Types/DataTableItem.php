<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A field-value pair component for use in a data table.
 */
class DataTableItem extends JsonSerializableType
{
    /**
     * @var 'field-value' $type The type of component you are rendering.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $field The text of the key in your key-value pair.
     */
    #[JsonProperty('field')]
    private string $field;

    /**
     * @var string $value The text of the value in your key-value pair.
     */
    #[JsonProperty('value')]
    private string $value;

    /**
     * @param array{
     *   type: 'field-value',
     *   field: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->field = $values['field'];
        $this->value = $values['value'];
    }

    /**
     * @return 'field-value'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'field-value' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $value
     */
    public function setField(string $value): self
    {
        $this->field = $value;
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
