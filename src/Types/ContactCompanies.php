<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object with metadata about companies attached to a contact . Up to 10 will be displayed here. Use the url to get more.
 */
class ContactCompanies extends JsonSerializableType
{
    /**
     * @var ?array<CompanyData> $data An array of company data objects attached to the contact.
     */
    #[JsonProperty('data'), ArrayType([CompanyData::class])]
    private ?array $data;

    /**
     * @var ?string $url Url to get more company resources for this contact
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?int $totalCount Integer representing the total number of companies attached to this contact
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?bool $hasMore Whether there's more Addressable Objects to be viewed. If true, use the url to view all
     */
    #[JsonProperty('has_more')]
    private ?bool $hasMore;

    /**
     * @param array{
     *   data?: ?array<CompanyData>,
     *   url?: ?string,
     *   totalCount?: ?int,
     *   hasMore?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
    }

    /**
     * @return ?array<CompanyData>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<CompanyData> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
     * @return ?bool
     */
    public function getHasMore(): ?bool
    {
        return $this->hasMore;
    }

    /**
     * @param ?bool $value
     */
    public function setHasMore(?bool $value = null): self
    {
        $this->hasMore = $value;
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
