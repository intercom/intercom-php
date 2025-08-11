<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\TicketTypeAttributeList;

/**
 * A ticket type, used to define the data fields to be captured in a ticket.
 */
class TicketType extends JsonSerializableType
{
    /**
     * @var 'ticket_type' $type String representing the object's type. Always has the value `ticket_type`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the ticket type.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var value-of<TicketTypeCategory> $category Category of the Ticket Type.
     */
    #[JsonProperty('category')]
    private string $category;

    /**
     * @var string $name The name of the ticket type
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $description The description of the ticket type
     */
    #[JsonProperty('description')]
    private string $description;

    /**
     * @var string $icon The icon of the ticket type
     */
    #[JsonProperty('icon')]
    private string $icon;

    /**
     * @var string $workspaceId The id of the workspace that the ticket type belongs to.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

    /**
     * @var TicketTypeAttributeList $ticketTypeAttributes
     */
    #[JsonProperty('ticket_type_attributes')]
    private TicketTypeAttributeList $ticketTypeAttributes;

    /**
     * @var bool $archived Whether the ticket type is archived or not.
     */
    #[JsonProperty('archived')]
    private bool $archived;

    /**
     * @var int $createdAt The date and time the ticket type was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt The date and time the ticket type was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   type: 'ticket_type',
     *   id: string,
     *   category: value-of<TicketTypeCategory>,
     *   name: string,
     *   description: string,
     *   icon: string,
     *   workspaceId: string,
     *   ticketTypeAttributes: TicketTypeAttributeList,
     *   archived: bool,
     *   createdAt: int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->category = $values['category'];
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->icon = $values['icon'];
        $this->workspaceId = $values['workspaceId'];
        $this->ticketTypeAttributes = $values['ticketTypeAttributes'];
        $this->archived = $values['archived'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return 'ticket_type'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket_type' $value
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
     * @return value-of<TicketTypeCategory>
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param value-of<TicketTypeCategory> $value
     */
    public function setCategory(string $value): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $value
     */
    public function setDescription(string $value): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $value
     */
    public function setIcon(string $value): self
    {
        $this->icon = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkspaceId(): string
    {
        return $this->workspaceId;
    }

    /**
     * @param string $value
     */
    public function setWorkspaceId(string $value): self
    {
        $this->workspaceId = $value;
        return $this;
    }

    /**
     * @return TicketTypeAttributeList
     */
    public function getTicketTypeAttributes(): TicketTypeAttributeList
    {
        return $this->ticketTypeAttributes;
    }

    /**
     * @param TicketTypeAttributeList $value
     */
    public function setTicketTypeAttributes(TicketTypeAttributeList $value): self
    {
        $this->ticketTypeAttributes = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getArchived(): bool
    {
        return $this->archived;
    }

    /**
     * @param bool $value
     */
    public function setArchived(bool $value): self
    {
        $this->archived = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
