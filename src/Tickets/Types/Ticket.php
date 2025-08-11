<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Types\LinkedObjectList;
use Intercom\Types\TicketParts;

/**
 * Tickets are how you track requests from your users.
 */
class Ticket extends JsonSerializableType
{
    /**
     * @var 'ticket' $type Always ticket
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The unique identifier for the ticket which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $ticketId The ID of the Ticket used in the Intercom Inbox and Messenger. Do not use ticket_id for API queries.
     */
    #[JsonProperty('ticket_id')]
    private string $ticketId;

    /**
     * @var value-of<TicketCategory> $category Category of the Ticket.
     */
    #[JsonProperty('category')]
    private string $category;

    /**
     * @var array<string, mixed> $ticketAttributes
     */
    #[JsonProperty('ticket_attributes'), ArrayType(['string' => 'mixed'])]
    private array $ticketAttributes;

    /**
     * @var value-of<TicketTicketState> $ticketState The state the ticket is currently in
     */
    #[JsonProperty('ticket_state')]
    private string $ticketState;

    /**
     * @var TicketType $ticketType
     */
    #[JsonProperty('ticket_type')]
    private TicketType $ticketType;

    /**
     * @var TicketContacts $contacts
     */
    #[JsonProperty('contacts')]
    private TicketContacts $contacts;

    /**
     * @var ?string $adminAssigneeId The id representing the admin assigned to the ticket.
     */
    #[JsonProperty('admin_assignee_id')]
    private ?string $adminAssigneeId;

    /**
     * @var ?string $teamAssigneeId The id representing the team assigned to the ticket.
     */
    #[JsonProperty('team_assignee_id')]
    private ?string $teamAssigneeId;

    /**
     * @var ?int $createdAt The time the ticket was created as a UTC Unix timestamp.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The last time the ticket was updated as a UTC Unix timestamp.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?bool $open Whether or not the ticket is open. If false, the ticket is closed.
     */
    #[JsonProperty('open')]
    private ?bool $open;

    /**
     * @var ?int $snoozedUntil The time the ticket will be snoozed until as a UTC Unix timestamp. If null, the ticket is not currently snoozed.
     */
    #[JsonProperty('snoozed_until')]
    private ?int $snoozedUntil;

    /**
     * @var ?LinkedObjectList $linkedObjects
     */
    #[JsonProperty('linked_objects')]
    private ?LinkedObjectList $linkedObjects;

    /**
     * @var ?TicketParts $ticketParts
     */
    #[JsonProperty('ticket_parts')]
    private ?TicketParts $ticketParts;

    /**
     * @var ?bool $isShared Whether or not the ticket is shared with the customer.
     */
    #[JsonProperty('is_shared')]
    private ?bool $isShared;

    /**
     * @var ?string $ticketStateInternalLabel The state the ticket is currently in, in a human readable form - visible in Intercom
     */
    #[JsonProperty('ticket_state_internal_label')]
    private ?string $ticketStateInternalLabel;

    /**
     * @var ?string $ticketStateExternalLabel The state the ticket is currently in, in a human readable form - visible to customers, in the messenger, email and tickets portal.
     */
    #[JsonProperty('ticket_state_external_label')]
    private ?string $ticketStateExternalLabel;

    /**
     * @param array{
     *   type: 'ticket',
     *   id: string,
     *   ticketId: string,
     *   category: value-of<TicketCategory>,
     *   ticketAttributes: array<string, mixed>,
     *   ticketState: value-of<TicketTicketState>,
     *   ticketType: TicketType,
     *   contacts: TicketContacts,
     *   adminAssigneeId?: ?string,
     *   teamAssigneeId?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   open?: ?bool,
     *   snoozedUntil?: ?int,
     *   linkedObjects?: ?LinkedObjectList,
     *   ticketParts?: ?TicketParts,
     *   isShared?: ?bool,
     *   ticketStateInternalLabel?: ?string,
     *   ticketStateExternalLabel?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->ticketId = $values['ticketId'];
        $this->category = $values['category'];
        $this->ticketAttributes = $values['ticketAttributes'];
        $this->ticketState = $values['ticketState'];
        $this->ticketType = $values['ticketType'];
        $this->contacts = $values['contacts'];
        $this->adminAssigneeId = $values['adminAssigneeId'] ?? null;
        $this->teamAssigneeId = $values['teamAssigneeId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->open = $values['open'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->linkedObjects = $values['linkedObjects'] ?? null;
        $this->ticketParts = $values['ticketParts'] ?? null;
        $this->isShared = $values['isShared'] ?? null;
        $this->ticketStateInternalLabel = $values['ticketStateInternalLabel'] ?? null;
        $this->ticketStateExternalLabel = $values['ticketStateExternalLabel'] ?? null;
    }

    /**
     * @return 'ticket'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
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
     * @return value-of<TicketCategory>
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param value-of<TicketCategory> $value
     */
    public function setCategory(string $value): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getTicketAttributes(): array
    {
        return $this->ticketAttributes;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setTicketAttributes(array $value): self
    {
        $this->ticketAttributes = $value;
        return $this;
    }

    /**
     * @return value-of<TicketTicketState>
     */
    public function getTicketState(): string
    {
        return $this->ticketState;
    }

    /**
     * @param value-of<TicketTicketState> $value
     */
    public function setTicketState(string $value): self
    {
        $this->ticketState = $value;
        return $this;
    }

    /**
     * @return TicketType
     */
    public function getTicketType(): TicketType
    {
        return $this->ticketType;
    }

    /**
     * @param TicketType $value
     */
    public function setTicketType(TicketType $value): self
    {
        $this->ticketType = $value;
        return $this;
    }

    /**
     * @return TicketContacts
     */
    public function getContacts(): TicketContacts
    {
        return $this->contacts;
    }

    /**
     * @param TicketContacts $value
     */
    public function setContacts(TicketContacts $value): self
    {
        $this->contacts = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdminAssigneeId(): ?string
    {
        return $this->adminAssigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminAssigneeId(?string $value = null): self
    {
        $this->adminAssigneeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamAssigneeId(): ?string
    {
        return $this->teamAssigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamAssigneeId(?string $value = null): self
    {
        $this->teamAssigneeId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
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
     * @return ?LinkedObjectList
     */
    public function getLinkedObjects(): ?LinkedObjectList
    {
        return $this->linkedObjects;
    }

    /**
     * @param ?LinkedObjectList $value
     */
    public function setLinkedObjects(?LinkedObjectList $value = null): self
    {
        $this->linkedObjects = $value;
        return $this;
    }

    /**
     * @return ?TicketParts
     */
    public function getTicketParts(): ?TicketParts
    {
        return $this->ticketParts;
    }

    /**
     * @param ?TicketParts $value
     */
    public function setTicketParts(?TicketParts $value = null): self
    {
        $this->ticketParts = $value;
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
     * @return ?string
     */
    public function getTicketStateInternalLabel(): ?string
    {
        return $this->ticketStateInternalLabel;
    }

    /**
     * @param ?string $value
     */
    public function setTicketStateInternalLabel(?string $value = null): self
    {
        $this->ticketStateInternalLabel = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTicketStateExternalLabel(): ?string
    {
        return $this->ticketStateExternalLabel;
    }

    /**
     * @param ?string $value
     */
    public function setTicketStateExternalLabel(?string $value = null): self
    {
        $this->ticketStateExternalLabel = $value;
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
