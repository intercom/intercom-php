<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Ticket type attribute, used to define each data field to be captured in a ticket.
 */
class TicketTypeAttribute extends JsonSerializableType
{
    /**
     * @var 'ticket_type_attribute' $type String representing the object's type. Always has the value `ticket_type_attribute`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the ticket type attribute.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $workspaceId The id of the workspace that the ticket type attribute belongs to.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

    /**
     * @var string $name The name of the ticket type attribute
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $description The description of the ticket type attribute
     */
    #[JsonProperty('description')]
    private string $description;

    /**
     * @var value-of<TicketTypeAttributeDataType> $dataType The type of the data attribute (allowed values: "string list integer decimal boolean datetime files")
     */
    #[JsonProperty('data_type')]
    private string $dataType;

    /**
     * @var array<string, mixed> $inputOptions Input options for the attribute
     */
    #[JsonProperty('input_options'), ArrayType(['string' => 'mixed'])]
    private array $inputOptions;

    /**
     * @var int $order The order of the attribute against other attributes
     */
    #[JsonProperty('order')]
    private int $order;

    /**
     * @var bool $requiredToCreate Whether the attribute is required or not for teammates.
     */
    #[JsonProperty('required_to_create')]
    private bool $requiredToCreate;

    /**
     * @var bool $requiredToCreateForContacts Whether the attribute is required or not for contacts.
     */
    #[JsonProperty('required_to_create_for_contacts')]
    private bool $requiredToCreateForContacts;

    /**
     * @var bool $visibleOnCreate Whether the attribute is visible or not to teammates.
     */
    #[JsonProperty('visible_on_create')]
    private bool $visibleOnCreate;

    /**
     * @var bool $visibleToContacts Whether the attribute is visible or not to contacts.
     */
    #[JsonProperty('visible_to_contacts')]
    private bool $visibleToContacts;

    /**
     * @var bool $default Whether the attribute is built in or not.
     */
    #[JsonProperty('default')]
    private bool $default;

    /**
     * @var int $ticketTypeId The id of the ticket type that the attribute belongs to.
     */
    #[JsonProperty('ticket_type_id')]
    private int $ticketTypeId;

    /**
     * @var bool $archived Whether the ticket type attribute is archived or not.
     */
    #[JsonProperty('archived')]
    private bool $archived;

    /**
     * @var int $createdAt The date and time the ticket type attribute was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt The date and time the ticket type attribute was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   type: 'ticket_type_attribute',
     *   id: string,
     *   workspaceId: string,
     *   name: string,
     *   description: string,
     *   dataType: value-of<TicketTypeAttributeDataType>,
     *   inputOptions: array<string, mixed>,
     *   order: int,
     *   requiredToCreate: bool,
     *   requiredToCreateForContacts: bool,
     *   visibleOnCreate: bool,
     *   visibleToContacts: bool,
     *   default: bool,
     *   ticketTypeId: int,
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
        $this->workspaceId = $values['workspaceId'];
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->dataType = $values['dataType'];
        $this->inputOptions = $values['inputOptions'];
        $this->order = $values['order'];
        $this->requiredToCreate = $values['requiredToCreate'];
        $this->requiredToCreateForContacts = $values['requiredToCreateForContacts'];
        $this->visibleOnCreate = $values['visibleOnCreate'];
        $this->visibleToContacts = $values['visibleToContacts'];
        $this->default = $values['default'];
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->archived = $values['archived'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return 'ticket_type_attribute'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket_type_attribute' $value
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
     * @return value-of<TicketTypeAttributeDataType>
     */
    public function getDataType(): string
    {
        return $this->dataType;
    }

    /**
     * @param value-of<TicketTypeAttributeDataType> $value
     */
    public function setDataType(string $value): self
    {
        $this->dataType = $value;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getInputOptions(): array
    {
        return $this->inputOptions;
    }

    /**
     * @param array<string, mixed> $value
     */
    public function setInputOptions(array $value): self
    {
        $this->inputOptions = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $value
     */
    public function setOrder(int $value): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRequiredToCreate(): bool
    {
        return $this->requiredToCreate;
    }

    /**
     * @param bool $value
     */
    public function setRequiredToCreate(bool $value): self
    {
        $this->requiredToCreate = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRequiredToCreateForContacts(): bool
    {
        return $this->requiredToCreateForContacts;
    }

    /**
     * @param bool $value
     */
    public function setRequiredToCreateForContacts(bool $value): self
    {
        $this->requiredToCreateForContacts = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getVisibleOnCreate(): bool
    {
        return $this->visibleOnCreate;
    }

    /**
     * @param bool $value
     */
    public function setVisibleOnCreate(bool $value): self
    {
        $this->visibleOnCreate = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getVisibleToContacts(): bool
    {
        return $this->visibleToContacts;
    }

    /**
     * @param bool $value
     */
    public function setVisibleToContacts(bool $value): self
    {
        $this->visibleToContacts = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $value
     */
    public function setDefault(bool $value): self
    {
        $this->default = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTicketTypeId(): int
    {
        return $this->ticketTypeId;
    }

    /**
     * @param int $value
     */
    public function setTicketTypeId(int $value): self
    {
        $this->ticketTypeId = $value;
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
