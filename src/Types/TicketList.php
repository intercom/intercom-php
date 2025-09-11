<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Tickets\Types\Ticket;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * Tickets are how you track requests from your users.
 */
class TicketList extends JsonSerializableType
{
    /**
     * @var ?'ticket.list' $type Always ticket.list
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?Ticket> $tickets The list of ticket objects
     */
    #[JsonProperty('tickets'), ArrayType([new Union(Ticket::class, 'null')])]
    private ?array $tickets;

    /**
     * @var ?int $totalCount A count of the total number of objects.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @param array{
     *   type?: ?'ticket.list',
     *   tickets?: ?array<?Ticket>,
     *   totalCount?: ?int,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->tickets = $values['tickets'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return ?'ticket.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'ticket.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<?Ticket>
     */
    public function getTickets(): ?array
    {
        return $this->tickets;
    }

    /**
     * @param ?array<?Ticket> $value
     */
    public function setTickets(?array $value = null): self
    {
        $this->tickets = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?CursorPages
     */
    public function getPages(): ?CursorPages
    {
        return $this->pages;
    }

    /**
     * @param ?CursorPages $value
     */
    public function setPages(?CursorPages $value = null): self
    {
        $this->pages = $value;
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
