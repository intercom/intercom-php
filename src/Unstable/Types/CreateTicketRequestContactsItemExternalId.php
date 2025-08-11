<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateTicketRequestContactsItemExternalId extends JsonSerializableType
{
    /**
     * @var string $externalId The external_id you have defined for the contact who is being added as a participant.
     */
    #[JsonProperty('external_id')]
    private string $externalId;

    /**
     * @param array{
     *   externalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $value
     */
    public function setExternalId(string $value): self
    {
        $this->externalId = $value;
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
