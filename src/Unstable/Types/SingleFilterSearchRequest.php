<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\Union;

/**
 * Search using Intercoms Search APIs with a single filter.
 */
class SingleFilterSearchRequest extends JsonSerializableType
{
    /**
     * @var ?string $field The accepted field that you want to search on.
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * @var ?value-of<SingleFilterSearchRequestOperator> $operator The accepted operators you can use to define how you want to search for the value.
     */
    #[JsonProperty('operator')]
    private ?string $operator;

    /**
     * @var (
     *    string
     *   |int
     *   |array<(
     *    string
     *   |int
     * )>
     * )|null $value The value that you want to search on.
     */
    #[JsonProperty('value'), Union('string', 'integer', [new Union('string', 'integer')], 'null')]
    private string|int|array|null $value;

    /**
     * @param array{
     *   field?: ?string,
     *   operator?: ?value-of<SingleFilterSearchRequestOperator>,
     *   value?: (
     *    string
     *   |int
     *   |array<(
     *    string
     *   |int
     * )>
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->operator = $values['operator'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?string $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
        return $this;
    }

    /**
     * @return ?value-of<SingleFilterSearchRequestOperator>
     */
    public function getOperator(): ?string
    {
        return $this->operator;
    }

    /**
     * @param ?value-of<SingleFilterSearchRequestOperator> $value
     */
    public function setOperator(?string $value = null): self
    {
        $this->operator = $value;
        return $this;
    }

    /**
     * @return (
     *    string
     *   |int
     *   |array<(
     *    string
     *   |int
     * )>
     * )|null
     */
    public function getValue(): string|int|array|null
    {
        return $this->value;
    }

    /**
     * @param (
     *    string
     *   |int
     *   |array<(
     *    string
     *   |int
     * )>
     * )|null $value
     */
    public function setValue(string|int|array|null $value = null): self
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
