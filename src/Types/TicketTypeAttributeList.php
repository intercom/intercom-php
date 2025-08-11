<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A list of attributes associated with a given ticket type.
 */
class TicketTypeAttributeList extends JsonSerializableType
{
    /**
     * @var 'ticket_type_attributes.list' $type String representing the object's type. Always has the value `ticket_type_attributes.list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<TicketTypeAttribute> $ticketTypeAttributes A list of ticket type attributes associated with a given ticket type.
     */
    #[JsonProperty('ticket_type_attributes'), ArrayType([TicketTypeAttribute::class])]
    private array $ticketTypeAttributes;

    /**
     * @param array{
     *   type: 'ticket_type_attributes.list',
     *   ticketTypeAttributes: array<TicketTypeAttribute>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->ticketTypeAttributes = $values['ticketTypeAttributes'];
    }

    /**
     * @return 'ticket_type_attributes.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket_type_attributes.list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<TicketTypeAttribute>
     */
    public function getTicketTypeAttributes(): array
    {
        return $this->ticketTypeAttributes;
    }

    /**
     * @param array<TicketTypeAttribute> $value
     */
    public function setTicketTypeAttributes(array $value): self
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
