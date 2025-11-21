<?php

namespace Intercom\Traits;

use Intercom\Types\CreateTicketRequestContactsItemId;
use Intercom\Types\CreateTicketRequestContactsItemExternalId;
use Intercom\Types\CreateTicketRequestContactsItemEmail;
use Intercom\Types\CreateTicketRequestAssignment;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * You can create a Ticket
 *
 * @property string $ticketTypeId
 * @property array<(
 *    CreateTicketRequestContactsItemId
 *   |CreateTicketRequestContactsItemExternalId
 *   |CreateTicketRequestContactsItemEmail
 * )> $contacts
 * @property ?string $conversationToLinkId
 * @property ?string $companyId
 * @property ?int $createdAt
 * @property ?CreateTicketRequestAssignment $assignment
 */
trait CreateTicketRequestBody
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
     * The ID of the conversation you want to link to the ticket. Here are the valid ways of linking two tickets:
     *  - conversation | back-office ticket
     *  - customer tickets | non-shared back-office ticket
     *  - conversation | tracker ticket
     *  - customer ticket | tracker ticket
     *
     * @var ?string $conversationToLinkId
     */
    #[JsonProperty('conversation_to_link_id')]
    private ?string $conversationToLinkId;

    /**
     * @var ?string $companyId The ID of the company that the ticket is associated with. The unique identifier for the company which is given by Intercom
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @var ?int $createdAt The time the ticket was created. If not provided, the current time will be used.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?CreateTicketRequestAssignment $assignment
     */
    #[JsonProperty('assignment')]
    private ?CreateTicketRequestAssignment $assignment;

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
    public function getConversationToLinkId(): ?string
    {
        return $this->conversationToLinkId;
    }

    /**
     * @param ?string $value
     */
    public function setConversationToLinkId(?string $value = null): self
    {
        $this->conversationToLinkId = $value;
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
     * @return ?CreateTicketRequestAssignment
     */
    public function getAssignment(): ?CreateTicketRequestAssignment
    {
        return $this->assignment;
    }

    /**
     * @param ?CreateTicketRequestAssignment $value
     */
    public function setAssignment(?CreateTicketRequestAssignment $value = null): self
    {
        $this->assignment = $value;
        return $this;
    }
}
