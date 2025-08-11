<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * You can tag a single company or a list of companies.
 */
class TagCompanyRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the tag, which will be created if not found.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var array<TagCompanyRequestCompaniesItem> $companies The id or company_id of the company can be passed as input parameters.
     */
    #[JsonProperty('companies'), ArrayType([TagCompanyRequestCompaniesItem::class])]
    private array $companies;

    /**
     * @param array{
     *   name: string,
     *   companies: array<TagCompanyRequestCompaniesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->companies = $values['companies'];
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
     * @return array<TagCompanyRequestCompaniesItem>
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param array<TagCompanyRequestCompaniesItem> $value
     */
    public function setCompanies(array $value): self
    {
        $this->companies = $value;
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
