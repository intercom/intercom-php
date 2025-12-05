<?php

namespace Intercom\CustomObjectInstances\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

class CreateOrUpdateCustomObjectInstanceRequest extends JsonSerializableType
{
    /**
     * @var string $customObjectTypeIdentifier The unique identifier of the custom object type that defines the structure of the custom object instance.
     */
    private string $customObjectTypeIdentifier;

    /**
     * @var ?string $externalId A unique identifier for the Custom Object instance in the external system it originated from.
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
     * @var ?array<string, ?string> $customAttributes The custom attributes which are set for the Custom Object instance.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => new Union('string', 'null')])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   customObjectTypeIdentifier: string,
     *   externalId?: ?string,
     *   externalCreatedAt?: ?int,
     *   externalUpdatedAt?: ?int,
     *   customAttributes?: ?array<string, ?string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customObjectTypeIdentifier = $values['customObjectTypeIdentifier'];
        $this->externalId = $values['externalId'] ?? null;
        $this->externalCreatedAt = $values['externalCreatedAt'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function getCustomObjectTypeIdentifier(): string
    {
        return $this->customObjectTypeIdentifier;
    }

    /**
     * @param string $value
     */
    public function setCustomObjectTypeIdentifier(string $value): self
    {
        $this->customObjectTypeIdentifier = $value;
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
     * @return ?array<string, ?string>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, ?string> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }
}
