<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Paginated Response
 */
class PaginatedResponse extends JsonSerializableType
{
    /**
     * @var ?value-of<PaginatedResponseType> $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @var ?int $totalCount A count of the total number of objects.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?array<PaginatedResponseDataItem> $data An array of Objects
     */
    #[JsonProperty('data'), ArrayType([PaginatedResponseDataItem::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?value-of<PaginatedResponseType>,
     *   pages?: ?CursorPages,
     *   totalCount?: ?int,
     *   data?: ?array<PaginatedResponseDataItem>,
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
     * @return ?value-of<PaginatedResponseType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<PaginatedResponseType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
     * @return ?array<PaginatedResponseDataItem>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<PaginatedResponseDataItem> $value
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
