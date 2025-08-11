<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Phone Switch Response
 */
class PhoneSwitch extends JsonSerializableType
{
    /**
     * @var ?'phone_call_redirect' $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $phone Phone number in E.164 format, that has received the SMS to continue the conversation in the Messenger.
     */
    #[JsonProperty('phone')]
    private ?string $phone;

    /**
     * @param array{
     *   type?: ?'phone_call_redirect',
     *   phone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->phone = $values['phone'] ?? null;
    }

    /**
     * @return ?'phone_call_redirect'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'phone_call_redirect' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
