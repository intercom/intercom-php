<?php

namespace Intercom\Visitors\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UserWithUserId extends JsonSerializableType
{
    /**
     * @var string $userId A unique identifier for the contact which is given to Intercom.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @var ?string $email The contact's email, retained by default if one is present.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @param array{
     *   userId: string,
     *   email?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->email = $values['email'] ?? null;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
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
