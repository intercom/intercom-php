<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tickets\Types\TicketStateDetailed;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list of ticket states associated with a given ticket type.
 */
class TicketStateList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?TicketStateDetailed> $data A list of ticket states associated with a given ticket type.
     */
    #[JsonProperty('data'), ArrayType([new Union(TicketStateDetailed::class, 'null')])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<?TicketStateDetailed>,
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
     * @return ?array<?TicketStateDetailed>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<?TicketStateDetailed> $value
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
