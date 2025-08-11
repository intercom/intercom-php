<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list of attributes associated with a given ticket type.
 */
class TicketTypeAttributeList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `ticket_type_attributes.list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?TicketTypeAttribute> $ticketTypeAttributes A list of ticket type attributes associated with a given ticket type.
     */
    #[JsonProperty('ticket_type_attributes'), ArrayType([new Union(TicketTypeAttribute::class, 'null')])]
    private ?array $ticketTypeAttributes;

    /**
     * @param array{
     *   type?: ?string,
     *   ticketTypeAttributes?: ?array<?TicketTypeAttribute>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->ticketTypeAttributes = $values['ticketTypeAttributes'] ?? null;
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
     * @return ?array<?TicketTypeAttribute>
     */
    public function getTicketTypeAttributes(): ?array
    {
        return $this->ticketTypeAttributes;
    }

    /**
     * @param ?array<?TicketTypeAttribute> $value
     */
    public function setTicketTypeAttributes(?array $value = null): self
    {
        $this->ticketTypeAttributes = $value;
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
