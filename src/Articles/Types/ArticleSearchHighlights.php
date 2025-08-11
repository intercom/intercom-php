<?php

namespace Intercom\Articles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The highlighted results of an Article search. In the examples provided my search query is always "my query".
 */
class ArticleSearchHighlights extends JsonSerializableType
{
    /**
     * @var string $articleId The ID of the corresponding article.
     */
    #[JsonProperty('article_id')]
    private string $articleId;

    /**
     * @var array<ArticleSearchHighlightsHighlightedTitleItem> $highlightedTitle An Article title highlighted.
     */
    #[JsonProperty('highlighted_title'), ArrayType([ArticleSearchHighlightsHighlightedTitleItem::class])]
    private array $highlightedTitle;

    /**
     * @var array<array<ArticleSearchHighlightsHighlightedSummaryItemItem>> $highlightedSummary An Article description and body text highlighted.
     */
    #[JsonProperty('highlighted_summary'), ArrayType([[ArticleSearchHighlightsHighlightedSummaryItemItem::class]])]
    private array $highlightedSummary;

    /**
     * @param array{
     *   articleId: string,
     *   highlightedTitle: array<ArticleSearchHighlightsHighlightedTitleItem>,
     *   highlightedSummary: array<array<ArticleSearchHighlightsHighlightedSummaryItemItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->articleId = $values['articleId'];
        $this->highlightedTitle = $values['highlightedTitle'];
        $this->highlightedSummary = $values['highlightedSummary'];
    }

    /**
     * @return string
     */
    public function getArticleId(): string
    {
        return $this->articleId;
    }

    /**
     * @param string $value
     */
    public function setArticleId(string $value): self
    {
        $this->articleId = $value;
        return $this;
    }

    /**
     * @return array<ArticleSearchHighlightsHighlightedTitleItem>
     */
    public function getHighlightedTitle(): array
    {
        return $this->highlightedTitle;
    }

    /**
     * @param array<ArticleSearchHighlightsHighlightedTitleItem> $value
     */
    public function setHighlightedTitle(array $value): self
    {
        $this->highlightedTitle = $value;
        return $this;
    }

    /**
     * @return array<array<ArticleSearchHighlightsHighlightedSummaryItemItem>>
     */
    public function getHighlightedSummary(): array
    {
        return $this->highlightedSummary;
    }

    /**
     * @param array<array<ArticleSearchHighlightsHighlightedSummaryItemItem>> $value
     */
    public function setHighlightedSummary(array $value): self
    {
        $this->highlightedSummary = $value;
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
