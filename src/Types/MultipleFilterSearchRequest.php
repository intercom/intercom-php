<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * Search using Intercoms Search APIs with more than one filter.
 */
class MultipleFilterSearchRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<MultipleFilterSearchRequestOperator> $operator An operator to allow boolean inspection between multiple fields.
     */
    #[JsonProperty('operator')]
    private ?string $operator;

    /**
     * @var ?array<(
     *    MultipleFilterSearchRequest
     *   |SingleFilterSearchRequest
     * )> $value
     */
    #[JsonProperty('value'), ArrayType([new Union(MultipleFilterSearchRequest::class, SingleFilterSearchRequest::class)])]
    private ?array $value;

    /**
     * @param array{
     *   operator?: ?value-of<MultipleFilterSearchRequestOperator>,
     *   value?: ?array<(
     *    MultipleFilterSearchRequest
     *   |SingleFilterSearchRequest
     * )>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->operator = $values['operator'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?value-of<MultipleFilterSearchRequestOperator>
     */
    public function getOperator(): ?string
    {
        return $this->operator;
    }

    /**
     * @param ?value-of<MultipleFilterSearchRequestOperator> $value
     */
    public function setOperator(?string $value = null): self
    {
        $this->operator = $value;
        return $this;
    }

    /**
     * @return ?array<(
     *    MultipleFilterSearchRequest
     *   |SingleFilterSearchRequest
     * )>
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @param ?array<(
     *    MultipleFilterSearchRequest
     *   |SingleFilterSearchRequest
     * )> $value
     */
    public function setValue(?array $value = null): self
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
