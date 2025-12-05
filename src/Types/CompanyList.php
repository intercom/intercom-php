<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Companies\Types\Company;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of companies for the App.
 */
class CompanyList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of object - `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?OffsetPages $pages
     */
    #[JsonProperty('pages')]
    private ?OffsetPages $pages;

    /**
     * @var ?int $totalCount The total number of companies.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?array<Company> $data An array containing Company Objects.
     */
    #[JsonProperty('data'), ArrayType([Company::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   pages?: ?OffsetPages,
     *   totalCount?: ?int,
     *   data?: ?array<Company>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->pages = $values['pages'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?OffsetPages
     */
    public function getPages(): ?OffsetPages
    {
        return $this->pages;
    }

    /**
     * @param ?OffsetPages $value
     */
    public function setPages(?OffsetPages $value = null): self
    {
        $this->pages = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?array<Company>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Company> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
