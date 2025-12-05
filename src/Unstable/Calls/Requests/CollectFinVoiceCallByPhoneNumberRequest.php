<?php

namespace Intercom\Unstable\Calls\Requests;

use Intercom\Core\Json\JsonSerializableType;

class CollectFinVoiceCallByPhoneNumberRequest extends JsonSerializableType
{
    /**
     * @var string $phoneNumber Phone number in E.164 format
     */
    private string $phoneNumber;

    /**
     * @param array{
     *   phoneNumber: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'];
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
}
