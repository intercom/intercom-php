<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tickets\Types\TicketType;
use Intercom\Core\Types\ArrayType;

/**
 * A list of ticket types associated with a given workspace.
 */
class TicketTypeList extends JsonSerializableType
{
    /**
     * @var 'ticket_type_attributes.list' $type String representing the object's type. Always has the value `ticket_type.list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<TicketType> $ticketTypes A list of ticket_types associated with a given workspace.
     */
    #[JsonProperty('ticket_types'), ArrayType([TicketType::class])]
    private array $ticketTypes;

    /**
     * @param array{
     *   type: 'ticket_type_attributes.list',
     *   ticketTypes: array<TicketType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->ticketTypes = $values['ticketTypes'];
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
     * @return array<TicketType>
     */
    public function getTicketTypes(): array
    {
        return $this->ticketTypes;
    }

    /**
     * @param array<TicketType> $value
     */
    public function setTicketTypes(array $value): self
    {
        $this->ticketTypes = $value;
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
