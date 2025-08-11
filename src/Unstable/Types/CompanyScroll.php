<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Companies\Types\Company;
use Intercom\Core\Types\ArrayType;

/**
 * Companies allow you to represent organizations using your product. Each company will have its own description and be associated with contacts. You can fetch, create, update and list companies.
 */
class CompanyScroll extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of object - `list`
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Company> $data
     */
    #[JsonProperty('data'), ArrayType([Company::class])]
    private ?array $data;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @var ?int $totalCount The total number of companies
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?string $scrollParam The scroll parameter to use in the next request to fetch the next page of results.
     */
    #[JsonProperty('scroll_param')]
    private ?string $scrollParam;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<Company>,
     *   pages?: ?CursorPages,
     *   totalCount?: ?int,
     *   scrollParam?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->pages = $values['pages'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->scrollParam = $values['scrollParam'] ?? null;
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
     * @return ?CursorPages
     */
    public function getPages(): ?CursorPages
    {
        return $this->pages;
    }

    /**
     * @param ?CursorPages $value
     */
    public function setPages(?CursorPages $value = null): self
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
     * @return ?string
     */
    public function getScrollParam(): ?string
    {
        return $this->scrollParam;
    }

    /**
     * @param ?string $value
     */
    public function setScrollParam(?string $value = null): self
    {
        $this->scrollParam = $value;
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
