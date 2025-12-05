<?php

namespace Intercom\TicketTypes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\TicketTypes\Types\UpdateTicketTypeRequestCategory;

class UpdateTicketTypeRequest extends JsonSerializableType
{
    /**
     * @var string $ticketTypeId The unique identifier for the ticket type which is given by Intercom.
     */
    private string $ticketTypeId;

    /**
     * @var ?string $name The name of the ticket type.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description The description of the ticket type.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?value-of<UpdateTicketTypeRequestCategory> $category Category of the Ticket Type.
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @var ?string $icon The icon of the ticket type.
     */
    #[JsonProperty('icon')]
    private ?string $icon;

    /**
     * @var ?bool $archived The archived status of the ticket type.
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @var ?bool $isInternal Whether the tickets associated with this ticket type are intended for internal use only or will be shared with customers. This is currently a limited attribute.
     */
    #[JsonProperty('is_internal')]
    private ?bool $isInternal;

    /**
     * @param array{
     *   ticketTypeId: string,
     *   name?: ?string,
     *   description?: ?string,
     *   category?: ?value-of<UpdateTicketTypeRequestCategory>,
     *   icon?: ?string,
     *   archived?: ?bool,
     *   isInternal?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->icon = $values['icon'] ?? null;
        $this->archived = $values['archived'] ?? null;
        $this->isInternal = $values['isInternal'] ?? null;
    }

    /**
     * @return string
     */
    public function getTicketTypeId(): string
    {
        return $this->ticketTypeId;
    }

    /**
     * @param string $value
     */
    public function setTicketTypeId(string $value): self
    {
        $this->ticketTypeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?value-of<UpdateTicketTypeRequestCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<UpdateTicketTypeRequestCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param ?string $value
     */
    public function setIcon(?string $value = null): self
    {
        $this->icon = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    /**
     * @param ?bool $value
     */
    public function setArchived(?bool $value = null): self
    {
        $this->archived = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }

    /**
     * @param ?bool $value
     */
    public function setIsInternal(?bool $value = null): self
    {
        $this->isInternal = $value;
        return $this;
    }
}
