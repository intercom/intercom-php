<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Unstable\Tags\Types\TagBasic;
use Intercom\Core\Types\Union;

/**
 * A Conversation Part represents a message in the conversation.
 */
class ConversationPart extends JsonSerializableType
{
    /**
     * @var ?string $type Always conversation_part
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id representing the conversation part.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $partType The type of conversation part.
     */
    #[JsonProperty('part_type')]
    private ?string $partType;

    /**
     * @var ?string $body The message body, which may contain HTML. For Twitter, this will show a generic message regarding why the body is obscured.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $createdAt The time the conversation part was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The last time the conversation part was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?int $notifiedAt The time the user was notified with the conversation part.
     */
    #[JsonProperty('notified_at')]
    private ?int $notifiedAt;

    /**
     * @var ?Reference $assignedTo The id of the admin that was assigned the conversation by this conversation_part (null if there has been no change in assignment.)
     */
    #[JsonProperty('assigned_to')]
    private ?Reference $assignedTo;

    /**
     * @var ?ConversationPartAuthor $author
     */
    #[JsonProperty('author')]
    private ?ConversationPartAuthor $author;

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
     * @var ?bool $redacted Whether or not the conversation part has been redacted.
     */
    #[JsonProperty('redacted')]
    private ?bool $redacted;

    /**
     * @var ?EmailMessageMetadata $emailMessageMetadata
     */
    #[JsonProperty('email_message_metadata')]
    private ?EmailMessageMetadata $emailMessageMetadata;

    /**
     * @var ?ConversationPartMetadata $metadata
     */
    #[JsonProperty('metadata')]
    private ?ConversationPartMetadata $metadata;

    /**
     * @var ?value-of<ConversationPartState> $state Indicates the current state of conversation when the conversation part was created.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?array<TagBasic> $tags A list of tags objects associated with the conversation part.
     */
    #[JsonProperty('tags'), ArrayType([TagBasic::class])]
    private ?array $tags;

    /**
     * @var (
     *    ConversationAttributeUpdatedByWorkflow
     *   |ConversationAttributeUpdatedByAdmin
     *   |CustomActionStarted
     *   |CustomActionFinished
     *   |OperatorWorkflowEvent
     * )|null $eventDetails
     */
    #[JsonProperty('event_details'), Union(ConversationAttributeUpdatedByWorkflow::class, ConversationAttributeUpdatedByAdmin::class, CustomActionStarted::class, CustomActionFinished::class, OperatorWorkflowEvent::class, 'null')]
    private ConversationAttributeUpdatedByWorkflow|ConversationAttributeUpdatedByAdmin|CustomActionStarted|CustomActionFinished|OperatorWorkflowEvent|null $eventDetails;

    /**
     * @var ?string $appPackageCode The app package code if this part was created via API. null if the part was not created via API.
     */
    #[JsonProperty('app_package_code')]
    private ?string $appPackageCode;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   partType?: ?string,
     *   body?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   notifiedAt?: ?int,
     *   assignedTo?: ?Reference,
     *   author?: ?ConversationPartAuthor,
     *   attachments?: ?array<PartAttachment>,
     *   externalId?: ?string,
     *   redacted?: ?bool,
     *   emailMessageMetadata?: ?EmailMessageMetadata,
     *   metadata?: ?ConversationPartMetadata,
     *   state?: ?value-of<ConversationPartState>,
     *   tags?: ?array<TagBasic>,
     *   eventDetails?: (
     *    ConversationAttributeUpdatedByWorkflow
     *   |ConversationAttributeUpdatedByAdmin
     *   |CustomActionStarted
     *   |CustomActionFinished
     *   |OperatorWorkflowEvent
     * )|null,
     *   appPackageCode?: ?string,
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
        $this->notifiedAt = $values['notifiedAt'] ?? null;
        $this->assignedTo = $values['assignedTo'] ?? null;
        $this->author = $values['author'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->redacted = $values['redacted'] ?? null;
        $this->emailMessageMetadata = $values['emailMessageMetadata'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->eventDetails = $values['eventDetails'] ?? null;
        $this->appPackageCode = $values['appPackageCode'] ?? null;
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
     * @return ?string
     */
    public function getPartType(): ?string
    {
        return $this->partType;
    }

    /**
     * @param ?string $value
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
     * @return ?int
     */
    public function getNotifiedAt(): ?int
    {
        return $this->notifiedAt;
    }

    /**
     * @param ?int $value
     */
    public function setNotifiedAt(?int $value = null): self
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
     * @return ?ConversationPartAuthor
     */
    public function getAuthor(): ?ConversationPartAuthor
    {
        return $this->author;
    }

    /**
     * @param ?ConversationPartAuthor $value
     */
    public function setAuthor(?ConversationPartAuthor $value = null): self
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
     * @return ?EmailMessageMetadata
     */
    public function getEmailMessageMetadata(): ?EmailMessageMetadata
    {
        return $this->emailMessageMetadata;
    }

    /**
     * @param ?EmailMessageMetadata $value
     */
    public function setEmailMessageMetadata(?EmailMessageMetadata $value = null): self
    {
        $this->emailMessageMetadata = $value;
        return $this;
    }

    /**
     * @return ?ConversationPartMetadata
     */
    public function getMetadata(): ?ConversationPartMetadata
    {
        return $this->metadata;
    }

    /**
     * @param ?ConversationPartMetadata $value
     */
    public function setMetadata(?ConversationPartMetadata $value = null): self
    {
        $this->metadata = $value;
        return $this;
    }

    /**
     * @return ?value-of<ConversationPartState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<ConversationPartState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?array<TagBasic>
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param ?array<TagBasic> $value
     */
    public function setTags(?array $value = null): self
    {
        $this->tags = $value;
        return $this;
    }

    /**
     * @return (
     *    ConversationAttributeUpdatedByWorkflow
     *   |ConversationAttributeUpdatedByAdmin
     *   |CustomActionStarted
     *   |CustomActionFinished
     *   |OperatorWorkflowEvent
     * )|null
     */
    public function getEventDetails(): ConversationAttributeUpdatedByWorkflow|ConversationAttributeUpdatedByAdmin|CustomActionStarted|CustomActionFinished|OperatorWorkflowEvent|null
    {
        return $this->eventDetails;
    }

    /**
     * @param (
     *    ConversationAttributeUpdatedByWorkflow
     *   |ConversationAttributeUpdatedByAdmin
     *   |CustomActionStarted
     *   |CustomActionFinished
     *   |OperatorWorkflowEvent
     * )|null $value
     */
    public function setEventDetails(ConversationAttributeUpdatedByWorkflow|ConversationAttributeUpdatedByAdmin|CustomActionStarted|CustomActionFinished|OperatorWorkflowEvent|null $value = null): self
    {
        $this->eventDetails = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAppPackageCode(): ?string
    {
        return $this->appPackageCode;
    }

    /**
     * @param ?string $value
     */
    public function setAppPackageCode(?string $value = null): self
    {
        $this->appPackageCode = $value;
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
