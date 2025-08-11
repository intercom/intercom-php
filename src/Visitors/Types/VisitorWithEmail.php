<?php

namespace Intercom\Visitors\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class VisitorWithEmail extends JsonSerializableType
{
    /**
     * @var string $email The visitor's email.
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
