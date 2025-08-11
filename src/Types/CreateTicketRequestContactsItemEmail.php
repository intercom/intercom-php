<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateTicketRequestContactsItemEmail extends JsonSerializableType
{
    /**
     * @var string $email The email you have defined for the contact who is being added as a participant. If a contact with this email does not exist, one will be created.
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @param array{
     *   email: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
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
