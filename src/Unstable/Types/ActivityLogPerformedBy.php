<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Details about the Admin involved in the activity.
 */
class ActivityLogPerformedBy extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `admin`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id representing the admin.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $email The email of the admin.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $ip The IP address of the admin.
     */
    #[JsonProperty('ip')]
    private ?string $ip;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   email?: ?string,
     *   ip?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->ip = $values['ip'] ?? null;
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
     * @return ?string
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param ?string $value
     */
    public function setIp(?string $value = null): self
    {
        $this->ip = $value;
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
