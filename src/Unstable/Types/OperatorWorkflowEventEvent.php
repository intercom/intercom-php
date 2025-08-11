<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class OperatorWorkflowEventEvent extends JsonSerializableType
{
    /**
     * @var ?string $type Type of the workflow event initiated
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $result Result of the workflow event
     */
    #[JsonProperty('result')]
    private ?string $result;

    /**
     * @param array{
     *   type?: ?string,
     *   result?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->result = $values['result'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param ?string $value
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
