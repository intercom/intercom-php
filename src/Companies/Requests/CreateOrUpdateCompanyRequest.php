<?php

namespace Intercom\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class CreateOrUpdateCompanyRequest extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the Company
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $companyId The company id you have defined for the company. Can't be updated
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @var ?string $plan The name of the plan you have associated with the company.
     */
    #[JsonProperty('plan')]
    private ?string $plan;

    /**
     * @var ?int $size The number of employees in this company.
     */
    #[JsonProperty('size')]
    private ?int $size;

    /**
     * @var ?string $website The URL for this company's website. Please note that the value specified here is not validated. Accepts any string.
     */
    #[JsonProperty('website')]
    private ?string $website;

    /**
     * @var ?string $industry The industry that this company operates in.
     */
    #[JsonProperty('industry')]
    private ?string $industry;

    /**
     * @var ?array<string, mixed> $customAttributes A hash of key/value pairs containing any other data about the company you want Intercom to store.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @var ?int $remoteCreatedAt The time the company was created by you.
     */
    #[JsonProperty('remote_created_at')]
    private ?int $remoteCreatedAt;

    /**
     * @var ?int $monthlySpend How much revenue the company generates for your business. Note that this will truncate floats. i.e. it only allow for whole integers, 155.98 will be truncated to 155. Note that this has an upper limit of 2**31-1 or 2147483647..
     */
    #[JsonProperty('monthly_spend')]
    private ?int $monthlySpend;

    /**
     * @param array{
     *   name?: ?string,
     *   companyId?: ?string,
     *   plan?: ?string,
     *   size?: ?int,
     *   website?: ?string,
     *   industry?: ?string,
     *   customAttributes?: ?array<string, mixed>,
     *   remoteCreatedAt?: ?int,
     *   monthlySpend?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->plan = $values['plan'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->website = $values['website'] ?? null;
        $this->industry = $values['industry'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->remoteCreatedAt = $values['remoteCreatedAt'] ?? null;
        $this->monthlySpend = $values['monthlySpend'] ?? null;
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
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlan(): ?string
    {
        return $this->plan;
    }

    /**
     * @param ?string $value
     */
    public function setPlan(?string $value = null): self
    {
        $this->plan = $value;
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
     * @return ?int
     */
    public function getMonthlySpend(): ?int
    {
        return $this->monthlySpend;
    }

    /**
     * @param ?int $value
     */
    public function setMonthlySpend(?int $value = null): self
    {
        $this->monthlySpend = $value;
        return $this;
    }
}
