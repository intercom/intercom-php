<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A Conversation Part represents a message in the conversation.
 */
class ConversationPart extends JsonSerializableType
{
    /**
     * @var 'conversation_part' $type Always conversation_part
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the conversation part.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $partType The type of conversation part.
     */
    #[JsonProperty('part_type')]
    private string $partType;

    /**
     * @var ?string $body The message body, which may contain HTML. For Twitter, this will show a generic message regarding why the body is obscured.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var int $createdAt The time the conversation part was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt The last time the conversation part was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var int $notifiedAt The time the user was notified with the conversation part.
     */
    #[JsonProperty('notified_at')]
    private int $notifiedAt;

    /**
     * @var ?Reference $assignedTo The id of the admin that was assigned the conversation by this conversation_part (null if there has been no change in assignment.)
     */
    #[JsonProperty('assigned_to')]
    private ?Reference $assignedTo;

    /**
     * @var ConversationPartAuthor $author
     */
    #[JsonProperty('author')]
    private ConversationPartAuthor $author;

    /**
     * @var ?array<PartAttachment> $attachments A list of attachments for the part.
     */
    #[JsonProperty('attachments'), ArrayType([PartAttachment::class])]
    private ?array $attachments;

    /**
     * @var ?string $externalId The external id of the conversation part
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var bool $redacted Whether or not the conversation part has been redacted.
     */
    #[JsonProperty('redacted')]
    private bool $redacted;

    /**
     * @param array{
     *   type: 'conversation_part',
     *   id: string,
     *   partType: string,
     *   createdAt: int,
     *   notifiedAt: int,
     *   author: ConversationPartAuthor,
     *   redacted: bool,
     *   body?: ?string,
     *   updatedAt?: ?int,
     *   assignedTo?: ?Reference,
     *   attachments?: ?array<PartAttachment>,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->partType = $values['partType'];
        $this->body = $values['body'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->notifiedAt = $values['notifiedAt'];
        $this->assignedTo = $values['assignedTo'] ?? null;
        $this->author = $values['author'];
        $this->attachments = $values['attachments'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->redacted = $values['redacted'];
    }

    /**
     * @return 'conversation_part'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'conversation_part' $value
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
     * @return int
     */
    public function getNotifiedAt(): int
    {
        return $this->notifiedAt;
    }

    /**
     * @param int $value
     */
    public function setNotifiedAt(int $value): self
    {
        $this->notifiedAt = $value;
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
     * @return ConversationPartAuthor
     */
    public function getAuthor(): ConversationPartAuthor
    {
        return $this->author;
    }

    /**
     * @param ConversationPartAuthor $value
     */
    public function setAuthor(ConversationPartAuthor $value): self
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
     * @return bool
     */
    public function getRedacted(): bool
    {
        return $this->redacted;
    }

    /**
     * @param bool $value
     */
    public function setRedacted(bool $value): self
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
