<?php

namespace Intercom\Unstable\DataEvents\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class LisDataEventsRequestFilterIntercomUserId extends JsonSerializableType
{
    /**
     * @var string $intercomUserId
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
