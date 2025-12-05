<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Response containing information about a Fin Voice call
 */
class AiCallResponse extends JsonSerializableType
{
    /**
     * @var ?int $id The unique identifier for the external reference
     */
    #[JsonProperty('id')]
    private ?int $id;

    /**
     * @var ?int $appId The workspace identifier
     */
    #[JsonProperty('app_id')]
    private ?int $appId;

    /**
     * @var ?string $userPhoneNumber Phone number in E.164 format for the call
     */
    #[JsonProperty('user_phone_number')]
    private ?string $userPhoneNumber;

    /**
     * @var ?string $status Status of the call. Can be "registered", "in-progress", or a resolution state
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $intercomCallId The Intercom call identifier, if the call has been matched
     */
    #[JsonProperty('intercom_call_id')]
    private ?string $intercomCallId;

    /**
     * @var ?string $externalCallId The external call identifier from the call provider
     */
    #[JsonProperty('external_call_id')]
    private ?string $externalCallId;

    /**
     * @var ?string $intercomConversationId The Intercom conversation identifier, if a conversation has been created
     */
    #[JsonProperty('intercom_conversation_id')]
    private ?string $intercomConversationId;

    /**
     * @var ?array<array<string, mixed>> $callTranscript Array of transcript entries for the call
     */
    #[JsonProperty('call_transcript'), ArrayType([['string' => 'mixed']])]
    private ?array $callTranscript;

    /**
     * @var ?string $callSummary Summary of the call conversation, truncated to 256 characters. Empty string if no summary available.
     */
    #[JsonProperty('call_summary')]
    private ?string $callSummary;

    /**
     * @var ?array<array<string, mixed>> $intent Array of intent classifications for the call
     */
    #[JsonProperty('intent'), ArrayType([['string' => 'mixed']])]
    private ?array $intent;

    /**
     * @param array{
     *   id?: ?int,
     *   appId?: ?int,
     *   userPhoneNumber?: ?string,
     *   status?: ?string,
     *   intercomCallId?: ?string,
     *   externalCallId?: ?string,
     *   intercomConversationId?: ?string,
     *   callTranscript?: ?array<array<string, mixed>>,
     *   callSummary?: ?string,
     *   intent?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->appId = $values['appId'] ?? null;
        $this->userPhoneNumber = $values['userPhoneNumber'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->intercomCallId = $values['intercomCallId'] ?? null;
        $this->externalCallId = $values['externalCallId'] ?? null;
        $this->intercomConversationId = $values['intercomConversationId'] ?? null;
        $this->callTranscript = $values['callTranscript'] ?? null;
        $this->callSummary = $values['callSummary'] ?? null;
        $this->intent = $values['intent'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $value
     */
    public function setId(?int $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAppId(): ?int
    {
        return $this->appId;
    }

    /**
     * @param ?int $value
     */
    public function setAppId(?int $value = null): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUserPhoneNumber(): ?string
    {
        return $this->userPhoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setUserPhoneNumber(?string $value = null): self
    {
        $this->userPhoneNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIntercomCallId(): ?string
    {
        return $this->intercomCallId;
    }

    /**
     * @param ?string $value
     */
    public function setIntercomCallId(?string $value = null): self
    {
        $this->intercomCallId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalCallId(): ?string
    {
        return $this->externalCallId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalCallId(?string $value = null): self
    {
        $this->externalCallId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIntercomConversationId(): ?string
    {
        return $this->intercomConversationId;
    }

    /**
     * @param ?string $value
     */
    public function setIntercomConversationId(?string $value = null): self
    {
        $this->intercomConversationId = $value;
        return $this;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getCallTranscript(): ?array
    {
        return $this->callTranscript;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setCallTranscript(?array $value = null): self
    {
        $this->callTranscript = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCallSummary(): ?string
    {
        return $this->callSummary;
    }

    /**
     * @param ?string $value
     */
    public function setCallSummary(?string $value = null): self
    {
        $this->callSummary = $value;
        return $this;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getIntent(): ?array
    {
        return $this->intent;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setIntent(?array $value = null): self
    {
        $this->intent = $value;
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
