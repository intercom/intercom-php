<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Contains metadata if the message was sent as an email
 */
class EmailMessageMetadata extends JsonSerializableType
{
    /**
     * @var ?string $subject The subject of the email
     */
    #[JsonProperty('subject')]
    private ?string $subject;

    /**
     * @var ?array<EmailAddressHeader> $emailAddressHeaders A list of an email address headers.
     */
    #[JsonProperty('email_address_headers'), ArrayType([EmailAddressHeader::class])]
    private ?array $emailAddressHeaders;

    /**
     * @param array{
     *   subject?: ?string,
     *   emailAddressHeaders?: ?array<EmailAddressHeader>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subject = $values['subject'] ?? null;
        $this->emailAddressHeaders = $values['emailAddressHeaders'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param ?string $value
     */
    public function setSubject(?string $value = null): self
    {
        $this->subject = $value;
        return $this;
    }

    /**
     * @return ?array<EmailAddressHeader>
     */
    public function getEmailAddressHeaders(): ?array
    {
        return $this->emailAddressHeaders;
    }

    /**
     * @param ?array<EmailAddressHeader> $value
     */
    public function setEmailAddressHeaders(?array $value = null): self
    {
        $this->emailAddressHeaders = $value;
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
