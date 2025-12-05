<?php

namespace Intercom\Unstable\Calls\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Calls\Traits\Call;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use DateTime;

class ListCallsWithTranscriptsResponseDataItem extends JsonSerializableType
{
    use Call;

    /**
     * @var ?array<array<string, mixed>> $transcript The call transcript if available, otherwise an empty array.
     */
    #[JsonProperty('transcript'), ArrayType([['string' => 'mixed']])]
    private ?array $transcript;

    /**
     * @var ?string $transcriptStatus The status of the transcript if available.
     */
    #[JsonProperty('transcript_status')]
    private ?string $transcriptStatus;

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
     *   transcript?: ?array<array<string, mixed>>,
     *   transcriptStatus?: ?string,
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
        $this->transcript = $values['transcript'] ?? null;
        $this->transcriptStatus = $values['transcriptStatus'] ?? null;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getTranscript(): ?array
    {
        return $this->transcript;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setTranscript(?array $value = null): self
    {
        $this->transcript = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTranscriptStatus(): ?string
    {
        return $this->transcriptStatus;
    }

    /**
     * @param ?string $value
     */
    public function setTranscriptStatus(?string $value = null): self
    {
        $this->transcriptStatus = $value;
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
