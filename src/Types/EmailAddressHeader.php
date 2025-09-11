<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains data for an email address header for a conversation part that was sent as an email.
 */
class EmailAddressHeader extends JsonSerializableType
{
    /**
     * @var ?string $type The type of email address header
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $emailAddress The email address
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * @var ?string $name The name associated with the email address
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @param array{
     *   type?: ?string,
     *   emailAddress?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setEmailAddress(?string $value = null): self
    {
        $this->emailAddress = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
