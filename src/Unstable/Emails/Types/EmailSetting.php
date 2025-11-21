<?php

namespace Intercom\Unstable\Emails\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Represents a sender email address configuration
 */
class EmailSetting extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id Unique email setting identifier
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $email Full sender email address
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?bool $verified Whether the email address has been verified
     */
    #[JsonProperty('verified')]
    private ?bool $verified;

    /**
     * @var ?string $domain Domain portion of the email address
     */
    #[JsonProperty('domain')]
    private ?string $domain;

    /**
     * @var ?string $brandId Associated brand identifier
     */
    #[JsonProperty('brand_id')]
    private ?string $brandId;

    /**
     * @var ?bool $forwardingEnabled Whether email forwarding is active
     */
    #[JsonProperty('forwarding_enabled')]
    private ?bool $forwardingEnabled;

    /**
     * @var ?int $forwardedEmailLastReceivedAt Unix timestamp of last forwarded email received (null if never)
     */
    #[JsonProperty('forwarded_email_last_received_at')]
    private ?int $forwardedEmailLastReceivedAt;

    /**
     * @var ?int $createdAt Unix timestamp of creation
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt Unix timestamp of last modification
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   email?: ?string,
     *   verified?: ?bool,
     *   domain?: ?string,
     *   brandId?: ?string,
     *   forwardingEnabled?: ?bool,
     *   forwardedEmailLastReceivedAt?: ?int,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->verified = $values['verified'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->brandId = $values['brandId'] ?? null;
        $this->forwardingEnabled = $values['forwardingEnabled'] ?? null;
        $this->forwardedEmailLastReceivedAt = $values['forwardedEmailLastReceivedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
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
     * @return ?bool
     */
    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    /**
     * @param ?bool $value
     */
    public function setVerified(?bool $value = null): self
    {
        $this->verified = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param ?string $value
     */
    public function setDomain(?string $value = null): self
    {
        $this->domain = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBrandId(): ?string
    {
        return $this->brandId;
    }

    /**
     * @param ?string $value
     */
    public function setBrandId(?string $value = null): self
    {
        $this->brandId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getForwardingEnabled(): ?bool
    {
        return $this->forwardingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setForwardingEnabled(?bool $value = null): self
    {
        $this->forwardingEnabled = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getForwardedEmailLastReceivedAt(): ?int
    {
        return $this->forwardedEmailLastReceivedAt;
    }

    /**
     * @param ?int $value
     */
    public function setForwardedEmailLastReceivedAt(?int $value = null): self
    {
        $this->forwardedEmailLastReceivedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
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
