<?php

namespace Intercom\InternalArticles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing the results of the search.
 */
class InternalArticleSearchResponseData extends JsonSerializableType
{
    /**
     * @var ?array<InternalArticleListItem> $internalArticles An array of Internal Article objects
     */
    #[JsonProperty('internal_articles'), ArrayType([InternalArticleListItem::class])]
    private ?array $internalArticles;

    /**
     * @param array{
     *   internalArticles?: ?array<InternalArticleListItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->internalArticles = $values['internalArticles'] ?? null;
    }

    /**
     * @return ?array<InternalArticleListItem>
     */
    public function getInternalArticles(): ?array
    {
        return $this->internalArticles;
    }

    /**
     * @param ?array<InternalArticleListItem> $value
     */
    public function setInternalArticles(?array $value = null): self
    {
        $this->internalArticles = $value;
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
