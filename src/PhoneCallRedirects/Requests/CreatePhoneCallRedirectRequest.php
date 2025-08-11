<?php

namespace Intercom\PhoneCallRedirects\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class CreatePhoneCallRedirectRequest extends JsonSerializableType
{
    /**
     * @var string $phone Phone number in E.164 format, that will receive the SMS to continue the conversation in the Messenger.
     */
    #[JsonProperty('phone')]
    private string $phone;

    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   phone: string,
     *   customAttributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phone = $values['phone'];
        $this->customAttributes = $values['customAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $value
     */
    public function setPhone(string $value): self
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }
}
