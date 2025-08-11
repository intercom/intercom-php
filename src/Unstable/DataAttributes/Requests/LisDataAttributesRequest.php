<?php

namespace Intercom\Unstable\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\DataAttributes\Types\LisDataAttributesRequestModel;

class LisDataAttributesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<LisDataAttributesRequestModel> $model Specify the data attribute model to return.
     */
    private ?string $model;

    /**
     * @var ?bool $includeArchived Include archived attributes in the list. By default we return only non archived data attributes.
     */
    private ?bool $includeArchived;

    /**
     * @param array{
     *   model?: ?value-of<LisDataAttributesRequestModel>,
     *   includeArchived?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->includeArchived = $values['includeArchived'] ?? null;
    }

    /**
     * @return ?value-of<LisDataAttributesRequestModel>
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param ?value-of<LisDataAttributesRequestModel> $value
     */
    public function setModel(?string $value = null): self
    {
        $this->model = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeArchived(): ?bool
    {
        return $this->includeArchived;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeArchived(?bool $value = null): self
    {
        $this->includeArchived = $value;
        return $this;
    }
}
