<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * You can create a Ticket
 */
class CreateTicketRequest extends JsonSerializableType
{
    /**
     * @var string $ticketTypeId The ID of the type of ticket you want to create
     */
    #[JsonProperty('ticket_type_id')]
    private string $ticketTypeId;

    /**
     * @var array<(
     *    CreateTicketRequestContactsItemId
     *   |CreateTicketRequestContactsItemExternalId
     *   |CreateTicketRequestContactsItemEmail
     * )> $contacts The list of contacts (users or leads) affected by this ticket. Currently only one is allowed
     */
    #[JsonProperty('contacts'), ArrayType([new Union(CreateTicketRequestContactsItemId::class, CreateTicketRequestContactsItemExternalId::class, CreateTicketRequestContactsItemEmail::class)])]
    private array $contacts;

    /**
     * @var ?string $companyId The ID of the company that the ticket is associated with. The ID that you set upon company creation.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @var ?int $createdAt The time the ticket was created. If not provided, the current time will be used.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?array<string, mixed> $ticketAttributes
     */
    #[JsonProperty('ticket_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $ticketAttributes;

    /**
     * @param array{
     *   ticketTypeId: string,
     *   contacts: array<(
     *    CreateTicketRequestContactsItemId
     *   |CreateTicketRequestContactsItemExternalId
     *   |CreateTicketRequestContactsItemEmail
     * )>,
     *   companyId?: ?string,
     *   createdAt?: ?int,
     *   ticketAttributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->contacts = $values['contacts'];
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->ticketAttributes = $values['ticketAttributes'] ?? null;
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
     * @return array<(
     *    CreateTicketRequestContactsItemId
     *   |CreateTicketRequestContactsItemExternalId
     *   |CreateTicketRequestContactsItemEmail
     * )>
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array<(
     *    CreateTicketRequestContactsItemId
     *   |CreateTicketRequestContactsItemExternalId
     *   |CreateTicketRequestContactsItemEmail
     * )> $value
     */
    public function setContacts(array $value): self
    {
        $this->contacts = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
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
     * @return ?array<string, mixed>
     */
    public function getTicketAttributes(): ?array
    {
        return $this->ticketAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setTicketAttributes(?array $value = null): self
    {
        $this->ticketAttributes = $value;
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
