<?php

namespace Intercom\Articles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\CursorPages;

/**
 * The results of an Article search
 */
class SearchArticlesResponse extends JsonSerializableType
{
    /**
     * @var 'list' $type The type of the object - `list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $totalCount The total number of Articles matching the search query
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var SearchArticlesResponseData $data An object containing the results of the search.
     */
    #[JsonProperty('data')]
    private SearchArticlesResponseData $data;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @param array{
     *   type: 'list',
     *   totalCount: int,
     *   data: SearchArticlesResponseData,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->totalCount = $values['totalCount'];
        $this->data = $values['data'];
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
     * @return SearchArticlesResponseData
     */
    public function getData(): SearchArticlesResponseData
    {
        return $this->data;
    }

    /**
     * @param SearchArticlesResponseData $value
     */
    public function setData(SearchArticlesResponseData $value): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
