<?php

namespace Intercom\Calls\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Union;

/**
 * Represents a phone call in Intercom
 */
class Call extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `call`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the call.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $conversationId The id of the conversation associated with the call, if any.
     */
    #[JsonProperty('conversation_id')]
    private ?string $conversationId;

    /**
     * @var ?string $adminId The id of the admin associated with the call, if any.
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @var ?string $contactId The id of the contact associated with the call, if any.
     */
    #[JsonProperty('contact_id')]
    private ?string $contactId;

    /**
     * @var ?string $state The current state of the call.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var (
     *    DateTime
     *   |int
     * )|null $initiatedAt
     */
    #[JsonProperty('initiated_at'), Union('datetime', 'integer', 'null')]
    private DateTime|int|null $initiatedAt;

    /**
     * @var (
     *    DateTime
     *   |int
     * )|null $answeredAt
     */
    #[JsonProperty('answered_at'), Union('datetime', 'integer', 'null')]
    private DateTime|int|null $answeredAt;

    /**
     * @var (
     *    DateTime
     *   |int
     * )|null $endedAt
     */
    #[JsonProperty('ended_at'), Union('datetime', 'integer', 'null')]
    private DateTime|int|null $endedAt;

    /**
     * @var (
     *    DateTime
     *   |int
     * )|null $createdAt
     */
    #[JsonProperty('created_at'), Union('datetime', 'integer', 'null')]
    private DateTime|int|null $createdAt;

    /**
     * @var (
     *    DateTime
     *   |int
     * )|null $updatedAt
     */
    #[JsonProperty('updated_at'), Union('datetime', 'integer', 'null')]
    private DateTime|int|null $updatedAt;

    /**
     * @var ?string $recordingUrl API URL to download or redirect to the call recording if available.
     */
    #[JsonProperty('recording_url')]
    private ?string $recordingUrl;

    /**
     * @var ?string $transcriptionUrl API URL to download or redirect to the call transcript if available.
     */
    #[JsonProperty('transcription_url')]
    private ?string $transcriptionUrl;

    /**
     * @var ?string $callType The type of call.
     */
    #[JsonProperty('call_type')]
    private ?string $callType;

    /**
     * @var ?string $direction The direction of the call.
     */
    #[JsonProperty('direction')]
    private ?string $direction;

    /**
     * @var ?string $endedReason The reason for the call end, if applicable.
     */
    #[JsonProperty('ended_reason')]
    private ?string $endedReason;

    /**
     * @var ?string $phone The phone number involved in the call, in E.164 format.
     */
    #[JsonProperty('phone')]
    private ?string $phone;

    /**
     * @var ?string $finRecordingUrl API URL to the AI Agent (Fin) call recording if available.
     */
    #[JsonProperty('fin_recording_url')]
    private ?string $finRecordingUrl;

    /**
     * @var ?string $finTranscriptionUrl API URL to the AI Agent (Fin) call transcript if available.
     */
    #[JsonProperty('fin_transcription_url')]
    private ?string $finTranscriptionUrl;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   conversationId?: ?string,
     *   adminId?: ?string,
     *   contactId?: ?string,
     *   state?: ?string,
     *   initiatedAt?: (
     *    DateTime
     *   |int
     * )|null,
     *   answeredAt?: (
     *    DateTime
     *   |int
     * )|null,
     *   endedAt?: (
     *    DateTime
     *   |int
     * )|null,
     *   createdAt?: (
     *    DateTime
     *   |int
     * )|null,
     *   updatedAt?: (
     *    DateTime
     *   |int
     * )|null,
     *   recordingUrl?: ?string,
     *   transcriptionUrl?: ?string,
     *   callType?: ?string,
     *   direction?: ?string,
     *   endedReason?: ?string,
     *   phone?: ?string,
     *   finRecordingUrl?: ?string,
     *   finTranscriptionUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->adminId = $values['adminId'] ?? null;
        $this->contactId = $values['contactId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->initiatedAt = $values['initiatedAt'] ?? null;
        $this->answeredAt = $values['answeredAt'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->recordingUrl = $values['recordingUrl'] ?? null;
        $this->transcriptionUrl = $values['transcriptionUrl'] ?? null;
        $this->callType = $values['callType'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->endedReason = $values['endedReason'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->finRecordingUrl = $values['finRecordingUrl'] ?? null;
        $this->finTranscriptionUrl = $values['finTranscriptionUrl'] ?? null;
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
    public function getConversationId(): ?string
    {
        return $this->conversationId;
    }

    /**
     * @param ?string $value
     */
    public function setConversationId(?string $value = null): self
    {
        $this->conversationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminId(?string $value = null): self
    {
        $this->adminId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    /**
     * @param ?string $value
     */
    public function setContactId(?string $value = null): self
    {
        $this->contactId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?string $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return (
     *    DateTime
     *   |int
     * )|null
     */
    public function getInitiatedAt(): DateTime|int|null
    {
        return $this->initiatedAt;
    }

    /**
     * @param (
     *    DateTime
     *   |int
     * )|null $value
     */
    public function setInitiatedAt(DateTime|int|null $value = null): self
    {
        $this->initiatedAt = $value;
        return $this;
    }

    /**
     * @return (
     *    DateTime
     *   |int
     * )|null
     */
    public function getAnsweredAt(): DateTime|int|null
    {
        return $this->answeredAt;
    }

    /**
     * @param (
     *    DateTime
     *   |int
     * )|null $value
     */
    public function setAnsweredAt(DateTime|int|null $value = null): self
    {
        $this->answeredAt = $value;
        return $this;
    }

    /**
     * @return (
     *    DateTime
     *   |int
     * )|null
     */
    public function getEndedAt(): DateTime|int|null
    {
        return $this->endedAt;
    }

    /**
     * @param (
     *    DateTime
     *   |int
     * )|null $value
     */
    public function setEndedAt(DateTime|int|null $value = null): self
    {
        $this->endedAt = $value;
        return $this;
    }

    /**
     * @return (
     *    DateTime
     *   |int
     * )|null
     */
    public function getCreatedAt(): DateTime|int|null
    {
        return $this->createdAt;
    }

    /**
     * @param (
     *    DateTime
     *   |int
     * )|null $value
     */
    public function setCreatedAt(DateTime|int|null $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return (
     *    DateTime
     *   |int
     * )|null
     */
    public function getUpdatedAt(): DateTime|int|null
    {
        return $this->updatedAt;
    }

    /**
     * @param (
     *    DateTime
     *   |int
     * )|null $value
     */
    public function setUpdatedAt(DateTime|int|null $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRecordingUrl(): ?string
    {
        return $this->recordingUrl;
    }

    /**
     * @param ?string $value
     */
    public function setRecordingUrl(?string $value = null): self
    {
        $this->recordingUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTranscriptionUrl(): ?string
    {
        return $this->transcriptionUrl;
    }

    /**
     * @param ?string $value
     */
    public function setTranscriptionUrl(?string $value = null): self
    {
        $this->transcriptionUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCallType(): ?string
    {
        return $this->callType;
    }

    /**
     * @param ?string $value
     */
    public function setCallType(?string $value = null): self
    {
        $this->callType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * @param ?string $value
     */
    public function setDirection(?string $value = null): self
    {
        $this->direction = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndedReason(): ?string
    {
        return $this->endedReason;
    }

    /**
     * @param ?string $value
     */
    public function setEndedReason(?string $value = null): self
    {
        $this->endedReason = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param ?string $value
     */
    public function setPhone(?string $value = null): self
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFinRecordingUrl(): ?string
    {
        return $this->finRecordingUrl;
    }

    /**
     * @param ?string $value
     */
    public function setFinRecordingUrl(?string $value = null): self
    {
        $this->finRecordingUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFinTranscriptionUrl(): ?string
    {
        return $this->finTranscriptionUrl;
    }

    /**
     * @param ?string $value
     */
    public function setFinTranscriptionUrl(?string $value = null): self
    {
        $this->finTranscriptionUrl = $value;
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
