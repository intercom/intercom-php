<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UntagCompanyRequestCompaniesItem extends JsonSerializableType
{
    /**
     * @var string $id The Intercom defined id representing the company.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $companyId The company id you have defined for the company.
     */
    #[JsonProperty('company_id')]
    private string $companyId;

    /**
     * @var true $untag Always set to true
     */
    #[JsonProperty('untag')]
    private bool $untag;

    /**
     * @param array{
     *   id: string,
     *   companyId: string,
     *   untag: true,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->companyId = $values['companyId'];
        $this->untag = $values['untag'];
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
     * @return true
     */
    public function getUntag(): bool
    {
        return $this->untag;
    }

    /**
     * @param true $value
     */
    public function setUntag(bool $value): self
    {
        $this->untag = $value;
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
