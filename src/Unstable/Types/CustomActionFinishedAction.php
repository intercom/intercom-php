<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomActionFinishedAction extends JsonSerializableType
{
    /**
     * @var ?string $name Name of the action
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?value-of<CustomActionFinishedActionResult> $result Status of the action
     */
    #[JsonProperty('result')]
    private ?string $result;

    /**
     * @param array{
     *   name?: ?string,
     *   result?: ?value-of<CustomActionFinishedActionResult>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->result = $values['result'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?value-of<CustomActionFinishedActionResult>
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param ?value-of<CustomActionFinishedActionResult> $value
     */
    public function setResult(?string $value = null): self
    {
        $this->result = $value;
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
