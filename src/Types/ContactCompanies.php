<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing companies meta data about the companies that a contact has. Up to 10 will be displayed here. Use the url to get more.
 */
class ContactCompanies extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<ContactCompany> $data An array containing Company Objects
     */
    #[JsonProperty('data'), ArrayType([ContactCompany::class])]
    private ?array $data;

    /**
     * @var string $url Url to get more company resources for this contact
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @var int $totalCount Int representing the total number of companyies attached to this contact
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var bool $hasMore Whether there's more Addressable Objects to be viewed. If true, use the url to view all
     */
    #[JsonProperty('has_more')]
    private bool $hasMore;

    /**
     * @param array{
     *   url: string,
     *   totalCount: int,
     *   hasMore: bool,
     *   type?: ?'list',
     *   data?: ?array<ContactCompany>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->url = $values['url'];
        $this->totalCount = $values['totalCount'];
        $this->hasMore = $values['hasMore'];
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
     * @return ?array<ContactCompany>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<ContactCompany> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value): self
    {
        $this->url = $value;
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
     * @return bool
     */
    public function getHasMore(): bool
    {
        return $this->hasMore;
    }

    /**
     * @param bool $value
     */
    public function setHasMore(bool $value): self
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
