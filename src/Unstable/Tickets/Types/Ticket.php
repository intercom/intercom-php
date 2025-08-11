<?php

namespace Intercom\Unstable\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\FileAttribute;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;
use Intercom\Unstable\Types\LinkedObjectList;
use Intercom\Unstable\Types\TicketParts;

/**
 * Tickets are how you track requests from your users.
 */
class Ticket extends JsonSerializableType
{
    /**
     * @var ?'ticket' $type Always ticket
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the ticket which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $ticketId The ID of the Ticket used in the Intercom Inbox and Messenger. Do not use ticket_id for API queries.
     */
    #[JsonProperty('ticket_id')]
    private ?string $ticketId;

    /**
     * @var ?value-of<TicketCategory> $category Category of the Ticket.
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @var ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |FileAttribute
     *   |null
     * )> $ticketAttributes
     */
    #[JsonProperty('ticket_attributes'), ArrayType(['string' => new Union(new Union('string', 'null'), 'float', 'bool', ['mixed'], FileAttribute::class)])]
    private ?array $ticketAttributes;

    /**
     * @var ?TicketState $ticketState
     */
    #[JsonProperty('ticket_state')]
    private ?TicketState $ticketState;

    /**
     * @var ?TicketType $ticketType
     */
    #[JsonProperty('ticket_type')]
    private ?TicketType $ticketType;

    /**
     * @var ?TicketContacts $contacts
     */
    #[JsonProperty('contacts')]
    private ?TicketContacts $contacts;

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
     * @param array{
     *   type?: ?'ticket',
     *   id?: ?string,
     *   ticketId?: ?string,
     *   category?: ?value-of<TicketCategory>,
     *   ticketAttributes?: ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |FileAttribute
     *   |null
     * )>,
     *   ticketState?: ?TicketState,
     *   ticketType?: ?TicketType,
     *   contacts?: ?TicketContacts,
     *   adminAssigneeId?: ?string,
     *   teamAssigneeId?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   open?: ?bool,
     *   snoozedUntil?: ?int,
     *   linkedObjects?: ?LinkedObjectList,
     *   ticketParts?: ?TicketParts,
     *   isShared?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->ticketId = $values['ticketId'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->ticketAttributes = $values['ticketAttributes'] ?? null;
        $this->ticketState = $values['ticketState'] ?? null;
        $this->ticketType = $values['ticketType'] ?? null;
        $this->contacts = $values['contacts'] ?? null;
        $this->adminAssigneeId = $values['adminAssigneeId'] ?? null;
        $this->teamAssigneeId = $values['teamAssigneeId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->open = $values['open'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->linkedObjects = $values['linkedObjects'] ?? null;
        $this->ticketParts = $values['ticketParts'] ?? null;
        $this->isShared = $values['isShared'] ?? null;
    }

    /**
     * @return ?'ticket'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'ticket' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTicketId(): ?string
    {
        return $this->ticketId;
    }

    /**
     * @param ?string $value
     */
    public function setTicketId(?string $value = null): self
    {
        $this->ticketId = $value;
        return $this;
    }

    /**
     * @return ?value-of<TicketCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<TicketCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |FileAttribute
     *   |null
     * )>
     */
    public function getTicketAttributes(): ?array
    {
        return $this->ticketAttributes;
    }

    /**
     * @param ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |FileAttribute
     *   |null
     * )> $value
     */
    public function setTicketAttributes(?array $value = null): self
    {
        $this->ticketAttributes = $value;
        return $this;
    }

    /**
     * @return ?TicketState
     */
    public function getTicketState(): ?TicketState
    {
        return $this->ticketState;
    }

    /**
     * @param ?TicketState $value
     */
    public function setTicketState(?TicketState $value = null): self
    {
        $this->ticketState = $value;
        return $this;
    }

    /**
     * @return ?TicketType
     */
    public function getTicketType(): ?TicketType
    {
        return $this->ticketType;
    }

    /**
     * @param ?TicketType $value
     */
    public function setTicketType(?TicketType $value = null): self
    {
        $this->ticketType = $value;
        return $this;
    }

    /**
     * @return ?TicketContacts
     */
    public function getContacts(): ?TicketContacts
    {
        return $this->contacts;
    }

    /**
     * @param ?TicketContacts $value
     */
    public function setContacts(?TicketContacts $value = null): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
