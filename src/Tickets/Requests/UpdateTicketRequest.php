<?php

namespace Intercom\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

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
     * @var ?string $ticketStateId The ID of the ticket state associated with the ticket type.
     */
    #[JsonProperty('ticket_state_id')]
    private ?string $ticketStateId;

    /**
     * @var ?string $companyId The ID of the company that the ticket is associated with. The unique identifier for the company which is given by Intercom. Set to nil to remove company.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

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
     * @var ?int $adminId The ID of the admin performing ticket update. Needed for workflows execution and attributing actions to specific admins.
     */
    #[JsonProperty('admin_id')]
    private ?int $adminId;

    /**
     * @var ?string $assigneeId The ID of the admin or team to which the ticket is assigned. Set this 0 to unassign it.
     */
    #[JsonProperty('assignee_id')]
    private ?string $assigneeId;

    /**
     * @param array{
     *   ticketId: string,
     *   ticketAttributes?: ?array<string, mixed>,
     *   ticketStateId?: ?string,
     *   companyId?: ?string,
     *   open?: ?bool,
     *   isShared?: ?bool,
     *   snoozedUntil?: ?int,
     *   adminId?: ?int,
     *   assigneeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketId = $values['ticketId'];
        $this->ticketAttributes = $values['ticketAttributes'] ?? null;
        $this->ticketStateId = $values['ticketStateId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->open = $values['open'] ?? null;
        $this->isShared = $values['isShared'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->adminId = $values['adminId'] ?? null;
        $this->assigneeId = $values['assigneeId'] ?? null;
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
     * @return ?string
     */
    public function getTicketStateId(): ?string
    {
        return $this->ticketStateId;
    }

    /**
     * @param ?string $value
     */
    public function setTicketStateId(?string $value = null): self
    {
        $this->ticketStateId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
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
     * @return ?int
     */
    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    /**
     * @param ?int $value
     */
    public function setAdminId(?int $value = null): self
    {
        $this->adminId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAssigneeId(): ?string
    {
        return $this->assigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setAssigneeId(?string $value = null): self
    {
        $this->assigneeId = $value;
        return $this;
    }
}
