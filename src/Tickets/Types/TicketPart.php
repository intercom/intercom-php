<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\Reference;
use Intercom\Types\TicketPartAuthor;
use Intercom\Types\PartAttachment;
use Intercom\Core\Types\ArrayType;

/**
 * A Ticket Part represents a message in the ticket.
 */
class TicketPart extends JsonSerializableType
{
    /**
     * @var 'ticket_part' $type Always ticket_part
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the ticket part.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $partType The type of ticket part.
     */
    #[JsonProperty('part_type')]
    private string $partType;

    /**
     * @var ?string $body The message body, which may contain HTML.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?value-of<TicketPartPreviousTicketState> $previousTicketState The previous state of the ticket.
     */
    #[JsonProperty('previous_ticket_state')]
    private ?string $previousTicketState;

    /**
     * @var value-of<TicketPartTicketState> $ticketState The state of the ticket.
     */
    #[JsonProperty('ticket_state')]
    private string $ticketState;

    /**
     * @var int $createdAt The time the ticket part was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt The last time the ticket part was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?Reference $assignedTo The id of the admin that was assigned the ticket by this ticket_part (null if there has been no change in assignment.)
     */
    #[JsonProperty('assigned_to')]
    private ?Reference $assignedTo;

    /**
     * @var ?TicketPartAuthor $author
     */
    #[JsonProperty('author')]
    private ?TicketPartAuthor $author;

    /**
     * @var ?array<PartAttachment> $attachments A list of attachments for the part.
     */
    #[JsonProperty('attachments'), ArrayType([PartAttachment::class])]
    private ?array $attachments;

    /**
     * @var ?string $externalId The external id of the ticket part
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var ?bool $redacted Whether or not the ticket part has been redacted.
     */
    #[JsonProperty('redacted')]
    private ?bool $redacted;

    /**
     * @param array{
     *   type: 'ticket_part',
     *   id: string,
     *   partType: string,
     *   ticketState: value-of<TicketPartTicketState>,
     *   createdAt: int,
     *   body?: ?string,
     *   previousTicketState?: ?value-of<TicketPartPreviousTicketState>,
     *   updatedAt?: ?int,
     *   assignedTo?: ?Reference,
     *   author?: ?TicketPartAuthor,
     *   attachments?: ?array<PartAttachment>,
     *   externalId?: ?string,
     *   redacted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->partType = $values['partType'];
        $this->body = $values['body'] ?? null;
        $this->previousTicketState = $values['previousTicketState'] ?? null;
        $this->ticketState = $values['ticketState'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->assignedTo = $values['assignedTo'] ?? null;
        $this->author = $values['author'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->redacted = $values['redacted'] ?? null;
    }

    /**
     * @return 'ticket_part'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'ticket_part' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPartType(): string
    {
        return $this->partType;
    }

    /**
     * @param string $value
     */
    public function setPartType(string $value): self
    {
        $this->partType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return ?value-of<TicketPartPreviousTicketState>
     */
    public function getPreviousTicketState(): ?string
    {
        return $this->previousTicketState;
    }

    /**
     * @param ?value-of<TicketPartPreviousTicketState> $value
     */
    public function setPreviousTicketState(?string $value = null): self
    {
        $this->previousTicketState = $value;
        return $this;
    }

    /**
     * @return value-of<TicketPartTicketState>
     */
    public function getTicketState(): string
    {
        return $this->ticketState;
    }

    /**
     * @param value-of<TicketPartTicketState> $value
     */
    public function setTicketState(string $value): self
    {
        $this->ticketState = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?Reference
     */
    public function getAssignedTo(): ?Reference
    {
        return $this->assignedTo;
    }

    /**
     * @param ?Reference $value
     */
    public function setAssignedTo(?Reference $value = null): self
    {
        $this->assignedTo = $value;
        return $this;
    }

    /**
     * @return ?TicketPartAuthor
     */
    public function getAuthor(): ?TicketPartAuthor
    {
        return $this->author;
    }

    /**
     * @param ?TicketPartAuthor $value
     */
    public function setAuthor(?TicketPartAuthor $value = null): self
    {
        $this->author = $value;
        return $this;
    }

    /**
     * @return ?array<PartAttachment>
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param ?array<PartAttachment> $value
     */
    public function setAttachments(?array $value = null): self
    {
        $this->attachments = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRedacted(): ?bool
    {
        return $this->redacted;
    }

    /**
     * @param ?bool $value
     */
    public function setRedacted(?bool $value = null): self
    {
        $this->redacted = $value;
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
