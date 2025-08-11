<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomerRequestIntercomUserId extends JsonSerializableType
{
    /**
     * @var string $intercomUserId The identifier for the contact as given by Intercom.
     */
    #[JsonProperty('intercom_user_id')]
    private string $intercomUserId;

    /**
     * @param array{
     *   intercomUserId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->intercomUserId = $values['intercomUserId'];
    }

    /**
     * @return string
     */
    public function getIntercomUserId(): string
    {
        return $this->intercomUserId;
    }

    /**
     * @param string $value
     */
    public function setIntercomUserId(string $value): self
    {
        $this->intercomUserId = $value;
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
