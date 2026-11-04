<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Response when a ticket is deleted.
 */
class DeleteTicketResponse extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the ticket.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'ticket' $object always ticket
     */
    #[JsonProperty('object')]
    private ?string $object;

    /**
     * @var ?bool $deleted Whether the ticket is deleted or not.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @param array{
     *   id?: ?string,
     *   object?: ?'ticket',
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
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
        $this->_setField('id');
        return $this;
    }

    /**
     * @return ?'ticket'
     */
    public function getObject(): ?string
    {
        return $this->object;
    }

    /**
     * @param ?'ticket' $value
     */
    public function setObject(?string $value = null): self
    {
        $this->object = $value;
        $this->_setField('object');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param ?bool $value
     */
    public function setDeleted(?bool $value = null): self
    {
        $this->deleted = $value;
        $this->_setField('deleted');
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
