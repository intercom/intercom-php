<?php

namespace Intercom\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\CreateTicketRequestBody;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\CreateTicketRequestContactsItemId;
use Intercom\Types\CreateTicketRequestContactsItemExternalId;
use Intercom\Types\CreateTicketRequestContactsItemEmail;
use Intercom\Types\CreateTicketRequestAssignment;

class EnqueueCreateTicketRequest extends JsonSerializableType
{
    use CreateTicketRequestBody;

    /**
     * @var ?bool $skipNotifications Option to disable notifications when a Ticket is created.
     */
    #[JsonProperty('skip_notifications')]
    private ?bool $skipNotifications;

    /**
     * @param array{
     *   ticketTypeId: string,
     *   contacts: array<(
     *    CreateTicketRequestContactsItemId
     *   |CreateTicketRequestContactsItemExternalId
     *   |CreateTicketRequestContactsItemEmail
     * )>,
     *   skipNotifications?: ?bool,
     *   conversationToLinkId?: ?string,
     *   companyId?: ?string,
     *   createdAt?: ?int,
     *   assignment?: ?CreateTicketRequestAssignment,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->skipNotifications = $values['skipNotifications'] ?? null;
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->contacts = $values['contacts'];
        $this->conversationToLinkId = $values['conversationToLinkId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->assignment = $values['assignment'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getSkipNotifications(): ?bool
    {
        return $this->skipNotifications;
    }

    /**
     * @param ?bool $value
     */
    public function setSkipNotifications(?bool $value = null): self
    {
        $this->skipNotifications = $value;
        return $this;
    }
}
