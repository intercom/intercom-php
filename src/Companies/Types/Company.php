<?php

namespace Intercom\Companies\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Companies allow you to represent organizations using your product. Each company will have its own description and be associated with contacts. You can fetch, create, update and list companies.
 */
class Company extends JsonSerializableType
{
    /**
     * @var string $id The Intercom defined id representing the company.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $name The name of the company.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $appId The Intercom defined code of the workspace the company is associated to.
     */
    #[JsonProperty('app_id')]
    private string $appId;

    /**
     * @var ?CompanyPlan $plan
     */
    #[JsonProperty('plan')]
    private ?CompanyPlan $plan;

    /**
     * @var string $companyId The company id you have defined for the company.
     */
    #[JsonProperty('company_id')]
    private string $companyId;

    /**
     * @var ?int $remoteCreatedAt The time the company was created by you.
     */
    #[JsonProperty('remote_created_at')]
    private ?int $remoteCreatedAt;

    /**
     * @var int $createdAt The time the company was added in Intercom.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var int $updatedAt The last time the company was updated.
     */
    #[JsonProperty('updated_at')]
    private int $updatedAt;

    /**
     * @var ?int $lastRequestAt The time the company last recorded making a request.
     */
    #[JsonProperty('last_request_at')]
    private ?int $lastRequestAt;

    /**
     * @var ?int $size The number of employees in the company.
     */
    #[JsonProperty('size')]
    private ?int $size;

    /**
     * @var ?string $website The URL for the company website.
     */
    #[JsonProperty('website')]
    private ?string $website;

    /**
     * @var ?string $industry The industry that the company operates in.
     */
    #[JsonProperty('industry')]
    private ?string $industry;

    /**
     * @var int $monthlySpend How much revenue the company generates for your business.
     */
    #[JsonProperty('monthly_spend')]
    private int $monthlySpend;

    /**
     * @var int $sessionCount How many sessions the company has recorded.
     */
    #[JsonProperty('session_count')]
    private int $sessionCount;

    /**
     * @var int $userCount The number of users in the company.
     */
    #[JsonProperty('user_count')]
    private int $userCount;

    /**
     * @var ?array<string, mixed> $customAttributes The custom attributes you have set on the company.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @var ?CompanyTags $tags The list of tags associated with the company
     */
    #[JsonProperty('tags')]
    private ?CompanyTags $tags;

    /**
     * @var ?CompanySegments $segments The list of segments associated with the company
     */
    #[JsonProperty('segments')]
    private ?CompanySegments $segments;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   appId: string,
     *   companyId: string,
     *   createdAt: int,
     *   updatedAt: int,
     *   monthlySpend: int,
     *   sessionCount: int,
     *   userCount: int,
     *   plan?: ?CompanyPlan,
     *   remoteCreatedAt?: ?int,
     *   lastRequestAt?: ?int,
     *   size?: ?int,
     *   website?: ?string,
     *   industry?: ?string,
     *   customAttributes?: ?array<string, mixed>,
     *   tags?: ?CompanyTags,
     *   segments?: ?CompanySegments,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->appId = $values['appId'];
        $this->plan = $values['plan'] ?? null;
        $this->companyId = $values['companyId'];
        $this->remoteCreatedAt = $values['remoteCreatedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastRequestAt = $values['lastRequestAt'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->website = $values['website'] ?? null;
        $this->industry = $values['industry'] ?? null;
        $this->monthlySpend = $values['monthlySpend'];
        $this->sessionCount = $values['sessionCount'];
        $this->userCount = $values['userCount'];
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->segments = $values['segments'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $value
     */
    public function setAppId(string $value): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return ?CompanyPlan
     */
    public function getPlan(): ?CompanyPlan
    {
        return $this->plan;
    }

    /**
     * @param ?CompanyPlan $value
     */
    public function setPlan(?CompanyPlan $value = null): self
    {
        $this->plan = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $value
     */
    public function setCompanyId(string $value): self
    {
        $this->companyId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getRemoteCreatedAt(): ?int
    {
        return $this->remoteCreatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setRemoteCreatedAt(?int $value = null): self
    {
        $this->remoteCreatedAt = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $value
     */
    public function setUpdatedAt(int $value): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastRequestAt(): ?int
    {
        return $this->lastRequestAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastRequestAt(?int $value = null): self
    {
        $this->lastRequestAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param ?int $value
     */
    public function setSize(?int $value = null): self
    {
        $this->size = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param ?string $value
     */
    public function setWebsite(?string $value = null): self
    {
        $this->website = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIndustry(): ?string
    {
        return $this->industry;
    }

    /**
     * @param ?string $value
     */
    public function setIndustry(?string $value = null): self
    {
        $this->industry = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonthlySpend(): int
    {
        return $this->monthlySpend;
    }

    /**
     * @param int $value
     */
    public function setMonthlySpend(int $value): self
    {
        $this->monthlySpend = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getSessionCount(): int
    {
        return $this->sessionCount;
    }

    /**
     * @param int $value
     */
    public function setSessionCount(int $value): self
    {
        $this->sessionCount = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserCount(): int
    {
        return $this->userCount;
    }

    /**
     * @param int $value
     */
    public function setUserCount(int $value): self
    {
        $this->userCount = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }

    /**
     * @return ?CompanyTags
     */
    public function getTags(): ?CompanyTags
    {
        return $this->tags;
    }

    /**
     * @param ?CompanyTags $value
     */
    public function setTags(?CompanyTags $value = null): self
    {
        $this->tags = $value;
        return $this;
    }

    /**
     * @return ?CompanySegments
     */
    public function getSegments(): ?CompanySegments
    {
        return $this->segments;
    }

    /**
     * @param ?CompanySegments $value
     */
    public function setSegments(?CompanySegments $value = null): self
    {
        $this->segments = $value;
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
