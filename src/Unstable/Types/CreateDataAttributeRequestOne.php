<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateDataAttributeRequestOne extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateDataAttributeRequestOneDataType> $dataType
     */
    #[JsonProperty('data_type')]
    private ?string $dataType;

    /**
     * @param array{
     *   dataType?: ?value-of<CreateDataAttributeRequestOneDataType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dataType = $values['dataType'] ?? null;
    }

    /**
     * @return ?value-of<CreateDataAttributeRequestOneDataType>
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    /**
     * @param ?value-of<CreateDataAttributeRequestOneDataType> $value
     */
    public function setDataType(?string $value = null): self
    {
        $this->dataType = $value;
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
