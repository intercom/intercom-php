<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomChannelContact extends JsonSerializableType
{
    /**
     * @var value-of<CustomChannelContactType> $type Type of contact, must be "user" or "lead".
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $externalId External identifier for the contact. Intercom will take care of the mapping of your external_id with our internal ones so you don't have to worry about it.
     */
    #[JsonProperty('external_id')]
    private string $externalId;

    /**
     * @var ?string $name Name of the contact. Required for user type.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $email Email address of the contact. Required for user type.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @param array{
     *   type: value-of<CustomChannelContactType>,
     *   externalId: string,
     *   name?: ?string,
     *   email?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->externalId = $values['externalId'];
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
    }

    /**
     * @return value-of<CustomChannelContactType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<CustomChannelContactType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
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
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
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
