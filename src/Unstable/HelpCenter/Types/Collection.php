<?php

namespace Intercom\Unstable\HelpCenter\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\GroupTranslatedContent;

/**
 * Collections are top level containers for Articles within the Help Center.
 */
class Collection extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the collection which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $workspaceId The id of the workspace which the collection belongs to.
     */
    #[JsonProperty('workspace_id')]
    private ?string $workspaceId;

    /**
     * @var ?string $name The name of the collection. For multilingual collections, this will be the name of the default language's content.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description The description of the collection. For multilingual help centers, this will be the description of the collection for the default language.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?int $createdAt The time when the article was created (seconds). For multilingual articles, this will be the timestamp of creation of the default language's content.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time when the article was last updated (seconds). For multilingual articles, this will be the timestamp of last update of the default language's content.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $url The URL of the collection. For multilingual help centers, this will be the URL of the collection for the default language.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?string $icon The icon of the collection.
     */
    #[JsonProperty('icon')]
    private ?string $icon;

    /**
     * @var ?int $order The order of the section in relation to others sections within a collection. Values go from `0` upwards. `0` is the default if there's no order.
     */
    #[JsonProperty('order')]
    private ?int $order;

    /**
     * @var ?string $defaultLocale The default locale of the help center. This field is only returned for multilingual help centers.
     */
    #[JsonProperty('default_locale')]
    private ?string $defaultLocale;

    /**
     * @var ?GroupTranslatedContent $translatedContent
     */
    #[JsonProperty('translated_content')]
    private ?GroupTranslatedContent $translatedContent;

    /**
     * @var ?string $parentId The id of the parent collection. If `null` then it is the first level collection.
     */
    #[JsonProperty('parent_id')]
    private ?string $parentId;

    /**
     * @var ?int $helpCenterId The id of the help center the collection is in.
     */
    #[JsonProperty('help_center_id')]
    private ?int $helpCenterId;

    /**
     * @param array{
     *   id?: ?string,
     *   workspaceId?: ?string,
     *   name?: ?string,
     *   description?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   url?: ?string,
     *   icon?: ?string,
     *   order?: ?int,
     *   defaultLocale?: ?string,
     *   translatedContent?: ?GroupTranslatedContent,
     *   parentId?: ?string,
     *   helpCenterId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->workspaceId = $values['workspaceId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->icon = $values['icon'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->defaultLocale = $values['defaultLocale'] ?? null;
        $this->translatedContent = $values['translatedContent'] ?? null;
        $this->parentId = $values['parentId'] ?? null;
        $this->helpCenterId = $values['helpCenterId'] ?? null;
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
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * @param ?string $value
     */
    public function setWorkspaceId(?string $value = null): self
    {
        $this->workspaceId = $value;
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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param ?string $value
     */
    public function setIcon(?string $value = null): self
    {
        $this->icon = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param ?int $value
     */
    public function setOrder(?int $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDefaultLocale(): ?string
    {
        return $this->defaultLocale;
    }

    /**
     * @param ?string $value
     */
    public function setDefaultLocale(?string $value = null): self
    {
        $this->defaultLocale = $value;
        return $this;
    }

    /**
     * @return ?GroupTranslatedContent
     */
    public function getTranslatedContent(): ?GroupTranslatedContent
    {
        return $this->translatedContent;
    }

    /**
     * @param ?GroupTranslatedContent $value
     */
    public function setTranslatedContent(?GroupTranslatedContent $value = null): self
    {
        $this->translatedContent = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param ?string $value
     */
    public function setParentId(?string $value = null): self
    {
        $this->parentId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getHelpCenterId(): ?int
    {
        return $this->helpCenterId;
    }

    /**
     * @param ?int $value
     */
    public function setHelpCenterId(?int $value = null): self
    {
        $this->helpCenterId = $value;
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
