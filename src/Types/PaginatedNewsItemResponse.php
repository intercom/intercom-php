<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\News\Types\NewsItem;
use Intercom\Core\Types\ArrayType;

/**
 * Paginated News Item Response
 */
class PaginatedNewsItemResponse extends JsonSerializableType
{
    /**
     * @var 'list' $type The type of object
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @var int $totalCount A count of the total number of News Items.
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var array<NewsItem> $data An array of News Items
     */
    #[JsonProperty('data'), ArrayType([NewsItem::class])]
    private array $data;

    /**
     * @param array{
     *   type: 'list',
     *   totalCount: int,
     *   data: array<NewsItem>,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->pages = $values['pages'] ?? null;
        $this->totalCount = $values['totalCount'];
        $this->data = $values['data'];
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
     * @return array<NewsItem>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array<NewsItem> $value
     */
    public function setData(array $value): self
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
