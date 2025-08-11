<?php

namespace Intercom\Unstable\CustomObjectInstances\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A Custom Object Instance represents an instance of a custom object type. This allows you to create and set custom attributes to store data about your customers that is not already captured by Intercom. The parent object includes recommended default attributes and you can add your own custom attributes.
 */
class CustomObjectInstance extends JsonSerializableType
{
    /**
     * @var ?string $id The Intercom defined id representing the custom object instance.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $externalId The id you have defined for the custom object instance.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var ?int $externalCreatedAt The time when the Custom Object instance was created in the external system it originated from.
     */
    #[JsonProperty('external_created_at')]
    private ?int $externalCreatedAt;

    /**
     * @var ?int $externalUpdatedAt The time when the Custom Object instance was last updated in the external system it originated from.
     */
    #[JsonProperty('external_updated_at')]
    private ?int $externalUpdatedAt;

    /**
     * @var ?int $createdAt The time the attribute was created as a UTC Unix timestamp
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time the attribute was last updated as a UTC Unix timestamp
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $type The identifier of the custom object type that defines the structure of the custom object instance.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<string, string> $customAttributes The custom attributes you have set on the custom object instance.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'string'])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   id?: ?string,
     *   externalId?: ?string,
     *   externalCreatedAt?: ?int,
     *   externalUpdatedAt?: ?int,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   type?: ?string,
     *   customAttributes?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->externalCreatedAt = $values['externalCreatedAt'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
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
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getExternalCreatedAt(): ?int
    {
        return $this->externalCreatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setExternalCreatedAt(?int $value = null): self
    {
        $this->externalCreatedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getExternalUpdatedAt(): ?int
    {
        return $this->externalUpdatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setExternalUpdatedAt(?int $value = null): self
    {
        $this->externalUpdatedAt = $value;
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
     * @return ?array<string, string>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, string> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
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
