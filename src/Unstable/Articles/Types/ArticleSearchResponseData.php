<?php

namespace Intercom\Unstable\Articles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing the results of the search.
 */
class ArticleSearchResponseData extends JsonSerializableType
{
    /**
     * @var ?array<Article> $articles An array of Article objects
     */
    #[JsonProperty('articles'), ArrayType([Article::class])]
    private ?array $articles;

    /**
     * @var ?array<ArticleSearchHighlights> $highlights A corresponding array of highlighted Article content
     */
    #[JsonProperty('highlights'), ArrayType([ArticleSearchHighlights::class])]
    private ?array $highlights;

    /**
     * @param array{
     *   articles?: ?array<Article>,
     *   highlights?: ?array<ArticleSearchHighlights>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->articles = $values['articles'] ?? null;
        $this->highlights = $values['highlights'] ?? null;
    }

    /**
     * @return ?array<Article>
     */
    public function getArticles(): ?array
    {
        return $this->articles;
    }

    /**
     * @param ?array<Article> $value
     */
    public function setArticles(?array $value = null): self
    {
        $this->articles = $value;
        return $this;
    }

    /**
     * @return ?array<ArticleSearchHighlights>
     */
    public function getHighlights(): ?array
    {
        return $this->highlights;
    }

    /**
     * @param ?array<ArticleSearchHighlights> $value
     */
    public function setHighlights(?array $value = null): self
    {
        $this->highlights = $value;
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
