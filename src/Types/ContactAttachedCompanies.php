<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Companies\Types\Company;
use Intercom\Core\Types\ArrayType;

/**
 * A list of Company Objects
 */
class ContactAttachedCompanies extends JsonSerializableType
{
    /**
     * @var 'list' $type The type of object
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<Company> $companies An array containing Company Objects
     */
    #[JsonProperty('companies'), ArrayType([Company::class])]
    private array $companies;

    /**
     * @var int $totalCount The total number of companies associated to this contact
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var ?PagesLink $pages
     */
    #[JsonProperty('pages')]
    private ?PagesLink $pages;

    /**
     * @param array{
     *   type: 'list',
     *   companies: array<Company>,
     *   totalCount: int,
     *   pages?: ?PagesLink,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->companies = $values['companies'];
        $this->totalCount = $values['totalCount'];
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return 'list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<Company>
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param array<Company> $value
     */
    public function setCompanies(array $value): self
    {
        $this->companies = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $value
     */
    public function setTotalCount(int $value): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?PagesLink
     */
    public function getPages(): ?PagesLink
    {
        return $this->pages;
    }

    /**
     * @param ?PagesLink $value
     */
    public function setPages(?PagesLink $value = null): self
    {
        $this->pages = $value;
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
