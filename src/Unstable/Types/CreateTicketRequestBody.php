<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * You can create a Ticket
 */
class CreateTicketRequestBody extends JsonSerializableType
{
    /**
     * @var string $ticketTypeId The ID of the type of ticket you want to create
     */
    #[JsonProperty('ticket_type_id')]
    private string $ticketTypeId;

    /**
     * @var array<(
     *    CreateTicketRequestBodyContactsItemId
     *   |CreateTicketRequestBodyContactsItemExternalId
     *   |CreateTicketRequestBodyContactsItemEmail
     * )> $contacts The list of contacts (users or leads) affected by this ticket. Currently only one is allowed
     */
    #[JsonProperty('contacts'), ArrayType([new Union(CreateTicketRequestBodyContactsItemId::class, CreateTicketRequestBodyContactsItemExternalId::class, CreateTicketRequestBodyContactsItemEmail::class)])]
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
     * @var ?CreateTicketRequestBodyAssignment $assignment
     */
    #[JsonProperty('assignment')]
    private ?CreateTicketRequestBodyAssignment $assignment;

    /**
     * @param array{
     *   ticketTypeId: string,
     *   contacts: array<(
     *    CreateTicketRequestBodyContactsItemId
     *   |CreateTicketRequestBodyContactsItemExternalId
     *   |CreateTicketRequestBodyContactsItemEmail
     * )>,
     *   conversationToLinkId?: ?string,
     *   companyId?: ?string,
     *   createdAt?: ?int,
     *   assignment?: ?CreateTicketRequestBodyAssignment,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->contacts = $values['contacts'];
        $this->conversationToLinkId = $values['conversationToLinkId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->assignment = $values['assignment'] ?? null;
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
        $this->_setField('ticketTypeId');
        return $this;
    }

    /**
     * @return array<(
     *    CreateTicketRequestBodyContactsItemId
     *   |CreateTicketRequestBodyContactsItemExternalId
     *   |CreateTicketRequestBodyContactsItemEmail
     * )>
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array<(
     *    CreateTicketRequestBodyContactsItemId
     *   |CreateTicketRequestBodyContactsItemExternalId
     *   |CreateTicketRequestBodyContactsItemEmail
     * )> $value
     */
    public function setContacts(array $value): self
    {
        $this->contacts = $value;
        $this->_setField('contacts');
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
        $this->_setField('conversationToLinkId');
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
        $this->_setField('companyId');
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
        $this->_setField('createdAt');
        return $this;
    }

    /**
     * @return ?CreateTicketRequestBodyAssignment
     */
    public function getAssignment(): ?CreateTicketRequestBodyAssignment
    {
        return $this->assignment;
    }

    /**
     * @param ?CreateTicketRequestBodyAssignment $value
     */
    public function setAssignment(?CreateTicketRequestBodyAssignment $value = null): self
    {
        $this->assignment = $value;
        $this->_setField('assignment');
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
