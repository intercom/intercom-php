<?php

namespace Intercom\Unstable\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list of ticket states associated with a given ticket type.
 */
class TicketTypeTicketStates extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?TicketState> $data A list of ticket states associated with a given ticket type.
     */
    #[JsonProperty('data'), ArrayType([new Union(TicketState::class, 'null')])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<?TicketState>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
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
     * @return ?array<?TicketState>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<?TicketState> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
