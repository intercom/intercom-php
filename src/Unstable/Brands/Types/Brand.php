<?php

namespace Intercom\Unstable\Brands\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Represents a branding configuration for the workspace
 */
class Brand extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id Unique brand identifier. For default brand, matches the workspace ID
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name Display name of the brand
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?bool $isDefault Whether this is the workspace's default brand
     */
    #[JsonProperty('is_default')]
    private ?bool $isDefault;

    /**
     * @var ?int $createdAt Unix timestamp of brand creation
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt Unix timestamp of last modification
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $helpCenterId Associated help center identifier
     */
    #[JsonProperty('help_center_id')]
    private ?string $helpCenterId;

    /**
     * @var ?string $defaultAddressSettingsId Default email settings ID for this brand
     */
    #[JsonProperty('default_address_settings_id')]
    private ?string $defaultAddressSettingsId;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   isDefault?: ?bool,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   helpCenterId?: ?string,
     *   defaultAddressSettingsId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->isDefault = $values['isDefault'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->helpCenterId = $values['helpCenterId'] ?? null;
        $this->defaultAddressSettingsId = $values['defaultAddressSettingsId'] ?? null;
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
     * @return ?bool
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * @param ?bool $value
     */
    public function setIsDefault(?bool $value = null): self
    {
        $this->isDefault = $value;
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
    public function getHelpCenterId(): ?string
    {
        return $this->helpCenterId;
    }

    /**
     * @param ?string $value
     */
    public function setHelpCenterId(?string $value = null): self
    {
        $this->helpCenterId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDefaultAddressSettingsId(): ?string
    {
        return $this->defaultAddressSettingsId;
    }

    /**
     * @param ?string $value
     */
    public function setDefaultAddressSettingsId(?string $value = null): self
    {
        $this->defaultAddressSettingsId = $value;
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
