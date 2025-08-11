<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\ContactReference;
use Intercom\Core\Types\ArrayType;

/**
 * The list of contacts affected by a ticket.
 */
class TicketContacts extends JsonSerializableType
{
    /**
     * @var 'contact.list' $type always contact.list
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<ContactReference> $contacts The list of contacts affected by this ticket.
     */
    #[JsonProperty('contacts'), ArrayType([ContactReference::class])]
    private array $contacts;

    /**
     * @param array{
     *   type: 'contact.list',
     *   contacts: array<ContactReference>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->contacts = $values['contacts'];
    }

    /**
     * @return 'contact.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'contact.list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<ContactReference>
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array<ContactReference> $value
     */
    public function setContacts(array $value): self
    {
        $this->contacts = $value;
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
