<?php

namespace Intercom\Articles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Articles\Traits\ArticleListItem;
use Intercom\Types\ArticleStatistics;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\ArticleTranslatedContent;

/**
 * The Articles API is a central place to gather all information and take actions on your articles. Articles can live within collections and sections, or alternatively they can stand alone.
 */
class Article extends JsonSerializableType
{
    use ArticleListItem;

    /**
     * @var ?ArticleStatistics $statistics
     */
    #[JsonProperty('statistics')]
    private ?ArticleStatistics $statistics;

    /**
     * @param array{
     *   id: string,
     *   workspaceId: string,
     *   title: string,
     *   authorId: int,
     *   state: value-of<ArticleListItemState>,
     *   createdAt: int,
     *   updatedAt: int,
     *   type?: ?'article',
     *   description?: ?string,
     *   body?: ?string,
     *   url?: ?string,
     *   parentId?: ?int,
     *   parentIds?: ?array<int>,
     *   parentType?: ?string,
     *   defaultLocale?: ?string,
     *   translatedContent?: ?ArticleTranslatedContent,
     *   statistics?: ?ArticleStatistics,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'];
        $this->workspaceId = $values['workspaceId'];
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->authorId = $values['authorId'];
        $this->state = $values['state'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->url = $values['url'] ?? null;
        $this->parentId = $values['parentId'] ?? null;
        $this->parentIds = $values['parentIds'] ?? null;
        $this->parentType = $values['parentType'] ?? null;
        $this->defaultLocale = $values['defaultLocale'] ?? null;
        $this->translatedContent = $values['translatedContent'] ?? null;
        $this->statistics = $values['statistics'] ?? null;
    }

    /**
     * @return ?ArticleStatistics
     */
    public function getStatistics(): ?ArticleStatistics
    {
        return $this->statistics;
    }

    /**
     * @param ?ArticleStatistics $value
     */
    public function setStatistics(?ArticleStatistics $value = null): self
    {
        $this->statistics = $value;
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
