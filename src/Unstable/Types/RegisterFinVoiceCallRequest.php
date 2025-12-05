<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Register a Fin Voice call with Intercom
 */
class RegisterFinVoiceCallRequest extends JsonSerializableType
{
    /**
     * @var string $phoneNumber Phone number in E.164 format for the call
     */
    #[JsonProperty('phone_number')]
    private string $phoneNumber;

    /**
     * @var string $callId External call identifier from the call provider
     */
    #[JsonProperty('call_id')]
    private string $callId;

    /**
     * @var ?value-of<RegisterFinVoiceCallRequestSource> $source Source of the call. Can be "five9", "zoom_phone", or defaults to "aws_connect"
     */
    #[JsonProperty('source')]
    private ?string $source;

    /**
     * @var ?array<string, mixed> $data Additional metadata about the call
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    private ?array $data;

    /**
     * @param array{
     *   phoneNumber: string,
     *   callId: string,
     *   source?: ?value-of<RegisterFinVoiceCallRequestSource>,
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'];
        $this->callId = $values['callId'];
        $this->source = $values['source'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $value
     */
    public function setPhoneNumber(string $value): self
    {
        $this->phoneNumber = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallId(): string
    {
        return $this->callId;
    }

    /**
     * @param string $value
     */
    public function setCallId(string $value): self
    {
        $this->callId = $value;
        return $this;
    }

    /**
     * @return ?value-of<RegisterFinVoiceCallRequestSource>
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param ?value-of<RegisterFinVoiceCallRequestSource> $value
     */
    public function setSource(?string $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
