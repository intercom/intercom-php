<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tickets\Types\TicketPart;
use Intercom\Core\Types\ArrayType;

/**
 * A list of Ticket Part objects for each note and event in the ticket. There is a limit of 500 parts.
 */
class TicketParts extends JsonSerializableType
{
    /**
     * @var 'ticket_part.list' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<TicketPart> $ticketParts A list of Ticket Part objects for each ticket. There is a limit of 500 parts.
     */
    #[JsonProperty('ticket_parts'), ArrayType([TicketPart::class])]
    private array $ticketParts;

    /**
     * @var int $totalCount
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @param array{
     *   type: 'ticket_part.list',
     *   ticketParts: array<TicketPart>,
     *   totalCount: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->ticketParts = $values['ticketParts'];
        $this->totalCount = $values['totalCount'];
    }

    /**
     * @return 'ticket_part.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket_part.list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<TicketPart>
     */
    public function getTicketParts(): array
    {
        return $this->ticketParts;
    }

    /**
     * @param array<TicketPart> $value
     */
    public function setTicketParts(array $value): self
    {
        $this->ticketParts = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $value
     */
    public function setTotalCount(int $value): self
    {
        $this->totalCount = $value;
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
