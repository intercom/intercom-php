<?php

namespace Intercom\InternalArticles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\CursorPages;

/**
 * The results of an Internal Article search
 */
class InternalArticleSearchResponse extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object - `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $totalCount The total number of Internal Articles matching the search query
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?InternalArticleSearchResponseData $data An object containing the results of the search.
     */
    #[JsonProperty('data')]
    private ?InternalArticleSearchResponseData $data;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @param array{
     *   type?: ?'list',
     *   totalCount?: ?int,
     *   data?: ?InternalArticleSearchResponseData,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->pages = $values['pages'] ?? null;
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
     * @return ?InternalArticleSearchResponseData
     */
    public function getData(): ?InternalArticleSearchResponseData
    {
        return $this->data;
    }

    /**
     * @param ?InternalArticleSearchResponseData $value
     */
    public function setData(?InternalArticleSearchResponseData $value = null): self
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
