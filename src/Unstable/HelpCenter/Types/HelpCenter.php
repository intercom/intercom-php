<?php

namespace Intercom\Unstable\HelpCenter\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Help Centers contain collections
 */
class HelpCenter extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the Help Center which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $workspaceId The id of the workspace which the Help Center belongs to.
     */
    #[JsonProperty('workspace_id')]
    private ?string $workspaceId;

    /**
     * @var ?int $createdAt The time when the Help Center was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time when the Help Center was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $identifier The identifier of the Help Center. This is used in the URL of the Help Center.
     */
    #[JsonProperty('identifier')]
    private ?string $identifier;

    /**
     * @var ?bool $websiteTurnedOn Whether the Help Center is turned on or not. This is controlled in your Help Center settings.
     */
    #[JsonProperty('website_turned_on')]
    private ?bool $websiteTurnedOn;

    /**
     * @var ?string $displayName The display name of the Help Center only seen by teammates.
     */
    #[JsonProperty('display_name')]
    private ?string $displayName;

    /**
     * @var ?string $url The URL for the help center, if you have a custom domain then this will show the URL using the custom domain.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?string $customDomain Custom domain configured for the help center
     */
    #[JsonProperty('custom_domain')]
    private ?string $customDomain;

    /**
     * @param array{
     *   id?: ?string,
     *   workspaceId?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   identifier?: ?string,
     *   websiteTurnedOn?: ?bool,
     *   displayName?: ?string,
     *   url?: ?string,
     *   customDomain?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->workspaceId = $values['workspaceId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->identifier = $values['identifier'] ?? null;
        $this->websiteTurnedOn = $values['websiteTurnedOn'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->customDomain = $values['customDomain'] ?? null;
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
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @param ?string $value
     */
    public function setIdentifier(?string $value = null): self
    {
        $this->identifier = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getWebsiteTurnedOn(): ?bool
    {
        return $this->websiteTurnedOn;
    }

    /**
     * @param ?bool $value
     */
    public function setWebsiteTurnedOn(?bool $value = null): self
    {
        $this->websiteTurnedOn = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayName(?string $value = null): self
    {
        $this->displayName = $value;
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
    public function getCustomDomain(): ?string
    {
        return $this->customDomain;
    }

    /**
     * @param ?string $value
     */
    public function setCustomDomain(?string $value = null): self
    {
        $this->customDomain = $value;
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
