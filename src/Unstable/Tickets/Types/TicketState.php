<?php

namespace Intercom\Unstable\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A ticket state, used to define the state of a ticket.
 */
class TicketState extends JsonSerializableType
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
     * @var ?value-of<TicketStateCategory> $category The category of the ticket state
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
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   category?: ?value-of<TicketStateCategory>,
     *   internalLabel?: ?string,
     *   externalLabel?: ?string,
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
     * @return ?value-of<TicketStateCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<TicketStateCategory> $value
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
