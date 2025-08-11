<?php

namespace Intercom\TicketTypes\Attributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UpdateTicketTypeAttributeRequest extends JsonSerializableType
{
    /**
     * @var string $ticketTypeId The unique identifier for the ticket type which is given by Intercom.
     */
    private string $ticketTypeId;

    /**
     * @var string $attributeId The unique identifier for the ticket type attribute which is given by Intercom.
     */
    private string $attributeId;

    /**
     * @var ?string $name The name of the ticket type attribute
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description The description of the attribute presented to the teammate or contact
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?bool $requiredToCreate Whether the attribute is required to be filled in when teammates are creating the ticket in Inbox.
     */
    #[JsonProperty('required_to_create')]
    private ?bool $requiredToCreate;

    /**
     * @var ?bool $requiredToCreateForContacts Whether the attribute is required to be filled in when contacts are creating the ticket in Messenger.
     */
    #[JsonProperty('required_to_create_for_contacts')]
    private ?bool $requiredToCreateForContacts;

    /**
     * @var ?bool $visibleOnCreate Whether the attribute is visible to teammates when creating a ticket in Inbox.
     */
    #[JsonProperty('visible_on_create')]
    private ?bool $visibleOnCreate;

    /**
     * @var ?bool $visibleToContacts Whether the attribute is visible to contacts when creating a ticket in Messenger.
     */
    #[JsonProperty('visible_to_contacts')]
    private ?bool $visibleToContacts;

    /**
     * @var ?bool $multiline Whether the attribute allows multiple lines of text (only applicable to string attributes)
     */
    #[JsonProperty('multiline')]
    private ?bool $multiline;

    /**
     * @var ?string $listItems A comma delimited list of items for the attribute value (only applicable to list attributes)
     */
    #[JsonProperty('list_items')]
    private ?string $listItems;

    /**
     * @var ?bool $allowMultipleValues Whether the attribute allows multiple files to be attached to it (only applicable to file attributes)
     */
    #[JsonProperty('allow_multiple_values')]
    private ?bool $allowMultipleValues;

    /**
     * @var ?bool $archived Whether the attribute should be archived and not shown during creation of the ticket (it will still be present on previously created tickets)
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @param array{
     *   ticketTypeId: string,
     *   attributeId: string,
     *   name?: ?string,
     *   description?: ?string,
     *   requiredToCreate?: ?bool,
     *   requiredToCreateForContacts?: ?bool,
     *   visibleOnCreate?: ?bool,
     *   visibleToContacts?: ?bool,
     *   multiline?: ?bool,
     *   listItems?: ?string,
     *   allowMultipleValues?: ?bool,
     *   archived?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->attributeId = $values['attributeId'];
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->requiredToCreate = $values['requiredToCreate'] ?? null;
        $this->requiredToCreateForContacts = $values['requiredToCreateForContacts'] ?? null;
        $this->visibleOnCreate = $values['visibleOnCreate'] ?? null;
        $this->visibleToContacts = $values['visibleToContacts'] ?? null;
        $this->multiline = $values['multiline'] ?? null;
        $this->listItems = $values['listItems'] ?? null;
        $this->allowMultipleValues = $values['allowMultipleValues'] ?? null;
        $this->archived = $values['archived'] ?? null;
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
     * @return string
     */
    public function getAttributeId(): string
    {
        return $this->attributeId;
    }

    /**
     * @param string $value
     */
    public function setAttributeId(string $value): self
    {
        $this->attributeId = $value;
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
     * @return ?bool
     */
    public function getRequiredToCreate(): ?bool
    {
        return $this->requiredToCreate;
    }

    /**
     * @param ?bool $value
     */
    public function setRequiredToCreate(?bool $value = null): self
    {
        $this->requiredToCreate = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRequiredToCreateForContacts(): ?bool
    {
        return $this->requiredToCreateForContacts;
    }

    /**
     * @param ?bool $value
     */
    public function setRequiredToCreateForContacts(?bool $value = null): self
    {
        $this->requiredToCreateForContacts = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getVisibleOnCreate(): ?bool
    {
        return $this->visibleOnCreate;
    }

    /**
     * @param ?bool $value
     */
    public function setVisibleOnCreate(?bool $value = null): self
    {
        $this->visibleOnCreate = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getVisibleToContacts(): ?bool
    {
        return $this->visibleToContacts;
    }

    /**
     * @param ?bool $value
     */
    public function setVisibleToContacts(?bool $value = null): self
    {
        $this->visibleToContacts = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getMultiline(): ?bool
    {
        return $this->multiline;
    }

    /**
     * @param ?bool $value
     */
    public function setMultiline(?bool $value = null): self
    {
        $this->multiline = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getListItems(): ?string
    {
        return $this->listItems;
    }

    /**
     * @param ?string $value
     */
    public function setListItems(?string $value = null): self
    {
        $this->listItems = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllowMultipleValues(): ?bool
    {
        return $this->allowMultipleValues;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowMultipleValues(?bool $value = null): self
    {
        $this->allowMultipleValues = $value;
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
}
