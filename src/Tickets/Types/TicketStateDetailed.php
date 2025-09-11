<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A ticket state, used to define the state of a ticket.
 */
class TicketStateDetailed extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `ticket_state`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the ticket state
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?value-of<TicketStateDetailedCategory> $category The category of the ticket state
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @var ?string $internalLabel The state the ticket is currently in, in a human readable form - visible in Intercom
     */
    #[JsonProperty('internal_label')]
    private ?string $internalLabel;

    /**
     * @var ?string $externalLabel The state the ticket is currently in, in a human readable form - visible to customers, in the messenger, email and tickets portal.
     */
    #[JsonProperty('external_label')]
    private ?string $externalLabel;

    /**
     * @var ?bool $archived Whether the ticket state is archived
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @var ?TicketStateDetailedTicketTypes $ticketTypes A list of ticket types associated with a given ticket state.
     */
    #[JsonProperty('ticket_types')]
    private ?TicketStateDetailedTicketTypes $ticketTypes;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   category?: ?value-of<TicketStateDetailedCategory>,
     *   internalLabel?: ?string,
     *   externalLabel?: ?string,
     *   archived?: ?bool,
     *   ticketTypes?: ?TicketStateDetailedTicketTypes,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->internalLabel = $values['internalLabel'] ?? null;
        $this->externalLabel = $values['externalLabel'] ?? null;
        $this->archived = $values['archived'] ?? null;
        $this->ticketTypes = $values['ticketTypes'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
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
     * @return ?value-of<TicketStateDetailedCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<TicketStateDetailedCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInternalLabel(): ?string
    {
        return $this->internalLabel;
    }

    /**
     * @param ?string $value
     */
    public function setInternalLabel(?string $value = null): self
    {
        $this->internalLabel = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalLabel(): ?string
    {
        return $this->externalLabel;
    }

    /**
     * @param ?string $value
     */
    public function setExternalLabel(?string $value = null): self
    {
        $this->externalLabel = $value;
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
     * @return ?TicketStateDetailedTicketTypes
     */
    public function getTicketTypes(): ?TicketStateDetailedTicketTypes
    {
        return $this->ticketTypes;
    }

    /**
     * @param ?TicketStateDetailedTicketTypes $value
     */
    public function setTicketTypes(?TicketStateDetailedTicketTypes $value = null): self
    {
        $this->ticketTypes = $value;
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
