<?php

namespace Intercom\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Tickets\Types\UpdateTicketRequestState;
use Intercom\Tickets\Types\UpdateTicketRequestAssignment;

class UpdateTicketRequest extends JsonSerializableType
{
    /**
     * @var string $ticketId The unique identifier for the ticket which is given by Intercom
     */
    private string $ticketId;

    /**
     * @var ?array<string, mixed> $ticketAttributes The attributes set on the ticket.
     */
    #[JsonProperty('ticket_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $ticketAttributes;

    /**
     * @var ?value-of<UpdateTicketRequestState> $state The state of the ticket.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?bool $open Specify if a ticket is open. Set to false to close a ticket. Closing a ticket will also unsnooze it.
     */
    #[JsonProperty('open')]
    private ?bool $open;

    /**
     * @var ?bool $isShared Specify whether the ticket is visible to users.
     */
    #[JsonProperty('is_shared')]
    private ?bool $isShared;

    /**
     * @var ?int $snoozedUntil The time you want the ticket to reopen.
     */
    #[JsonProperty('snoozed_until')]
    private ?int $snoozedUntil;

    /**
     * @var ?UpdateTicketRequestAssignment $assignment
     */
    #[JsonProperty('assignment')]
    private ?UpdateTicketRequestAssignment $assignment;

    /**
     * @param array{
     *   ticketId: string,
     *   ticketAttributes?: ?array<string, mixed>,
     *   state?: ?value-of<UpdateTicketRequestState>,
     *   open?: ?bool,
     *   isShared?: ?bool,
     *   snoozedUntil?: ?int,
     *   assignment?: ?UpdateTicketRequestAssignment,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketId = $values['ticketId'];
        $this->ticketAttributes = $values['ticketAttributes'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->open = $values['open'] ?? null;
        $this->isShared = $values['isShared'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->assignment = $values['assignment'] ?? null;
    }

    /**
     * @return string
     */
    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    /**
     * @param string $value
     */
    public function setTicketId(string $value): self
    {
        $this->ticketId = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getTicketAttributes(): ?array
    {
        return $this->ticketAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setTicketAttributes(?array $value = null): self
    {
        $this->ticketAttributes = $value;
        return $this;
    }

    /**
     * @return ?value-of<UpdateTicketRequestState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<UpdateTicketRequestState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getOpen(): ?bool
    {
        return $this->open;
    }

    /**
     * @param ?bool $value
     */
    public function setOpen(?bool $value = null): self
    {
        $this->open = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsShared(): ?bool
    {
        return $this->isShared;
    }

    /**
     * @param ?bool $value
     */
    public function setIsShared(?bool $value = null): self
    {
        $this->isShared = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSnoozedUntil(): ?int
    {
        return $this->snoozedUntil;
    }

    /**
     * @param ?int $value
     */
    public function setSnoozedUntil(?int $value = null): self
    {
        $this->snoozedUntil = $value;
        return $this;
    }

    /**
     * @return ?UpdateTicketRequestAssignment
     */
    public function getAssignment(): ?UpdateTicketRequestAssignment
    {
        return $this->assignment;
    }

    /**
     * @param ?UpdateTicketRequestAssignment $value
     */
    public function setAssignment(?UpdateTicketRequestAssignment $value = null): self
    {
        $this->assignment = $value;
        return $this;
    }
}
