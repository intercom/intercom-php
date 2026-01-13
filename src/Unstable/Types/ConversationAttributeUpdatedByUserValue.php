<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConversationAttributeUpdatedByUserValue extends JsonSerializableType
{
    /**
     * @var ?string $name Current value of the CDA updated
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $previous Previous value of the CDA (null for older events)
     */
    #[JsonProperty('previous')]
    private ?string $previous;

    /**
     * @param array{
     *   name?: ?string,
     *   previous?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->previous = $values['previous'] ?? null;
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
     * @return ?string
     */
    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    /**
     * @param ?string $value
     */
    public function setPrevious(?string $value = null): self
    {
        $this->previous = $value;
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
