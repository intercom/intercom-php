<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A Ticket Part representing a note, comment, or quick_reply on a ticket
 */
class TicketReply extends JsonSerializableType
{
    /**
     * @var ?'ticket_part' $type Always ticket_part
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id representing the part.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?value-of<TicketReplyPartType> $partType Type of the part
     */
    #[JsonProperty('part_type')]
    private ?string $partType;

    /**
     * @var ?string $body The message body, which may contain HTML.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $createdAt The time the note was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The last time the note was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

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
     * @var ?bool $redacted Whether or not the ticket part has been redacted.
     */
    #[JsonProperty('redacted')]
    private ?bool $redacted;

    /**
     * @param array{
     *   type?: ?'ticket_part',
     *   id?: ?string,
     *   partType?: ?value-of<TicketReplyPartType>,
     *   body?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   author?: ?TicketPartAuthor,
     *   attachments?: ?array<PartAttachment>,
     *   redacted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->partType = $values['partType'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->author = $values['author'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->redacted = $values['redacted'] ?? null;
    }

    /**
     * @return ?'ticket_part'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'ticket_part' $value
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
     * @return ?value-of<TicketReplyPartType>
     */
    public function getPartType(): ?string
    {
        return $this->partType;
    }

    /**
     * @param ?value-of<TicketReplyPartType> $value
     */
    public function setPartType(?string $value = null): self
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
