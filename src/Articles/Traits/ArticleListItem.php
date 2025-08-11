<?php

namespace Intercom\Articles\Traits;

use Intercom\Articles\Types\ArticleListItemState;
use Intercom\Types\ArticleTranslatedContent;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The data returned about your articles when you list them.
 *
 * @property ?'article' $type
 * @property string $id
 * @property string $workspaceId
 * @property string $title
 * @property ?string $description
 * @property ?string $body
 * @property int $authorId
 * @property value-of<ArticleListItemState> $state
 * @property int $createdAt
 * @property int $updatedAt
 * @property ?string $url
 * @property ?int $parentId
 * @property ?array<int> $parentIds
 * @property ?string $parentType
 * @property ?string $defaultLocale
 * @property ?ArticleTranslatedContent $translatedContent
 */
trait ArticleListItem
{
    /**
     * @var ?'article' $type The type of object - `article`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var string $id The unique identifier for the article which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $workspaceId The id of the workspace which the article belongs to.
     */
    #[JsonProperty('workspace_id')]
    private string $workspaceId;

    /**
     * @var string $title The title of the article. For multilingual articles, this will be the title of the default language's content.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var ?string $description The description of the article. For multilingual articles, this will be the description of the default language's content.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $body The body of the article in HTML. For multilingual articles, this will be the body of the default language's content.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var int $authorId The id of the author of the article. For multilingual articles, this will be the id of the author of the default language's content. Must be a teammate on the help center's workspace.
     */
    #[JsonProperty('author_id')]
    private int $authorId;

    /**
     * @var value-of<ArticleListItemState> $state Whether the article is `published` or is a `draft`. For multilingual articles, this will be the state of the default language's content.
     */
    #[JsonProperty('state')]
    private string $state;

    /**
     * @var int $createdAt The time when the article was created. For multilingual articles, this will be the timestamp of creation of the default language's content in seconds.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var int $updatedAt The time when the article was last updated. For multilingual articles, this will be the timestamp of last update of the default language's content in seconds.
     */
    #[JsonProperty('updated_at')]
    private int $updatedAt;

    /**
     * @var ?string $url The URL of the article. For multilingual articles, this will be the URL of the default language's content.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?int $parentId The id of the article's parent collection or section. An article without this field stands alone.
     */
    #[JsonProperty('parent_id')]
    private ?int $parentId;

    /**
     * @var ?array<int> $parentIds The ids of the article's parent collections or sections. An article without this field stands alone.
     */
    #[JsonProperty('parent_ids'), ArrayType(['integer'])]
    private ?array $parentIds;

    /**
     * @var ?string $parentType The type of parent, which can either be a `collection` or `section`.
     */
    #[JsonProperty('parent_type')]
    private ?string $parentType;

    /**
     * @var ?string $defaultLocale The default locale of the help center. This field is only returned for multilingual help centers.
     */
    #[JsonProperty('default_locale')]
    private ?string $defaultLocale;

    /**
     * @var ?ArticleTranslatedContent $translatedContent
     */
    #[JsonProperty('translated_content')]
    private ?ArticleTranslatedContent $translatedContent;

    /**
     * @return ?'article'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'article' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkspaceId(): string
    {
        return $this->workspaceId;
    }

    /**
     * @param string $value
     */
    public function setWorkspaceId(string $value): self
    {
        $this->workspaceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $value
     */
    public function setAuthorId(int $value): self
    {
        $this->authorId = $value;
        return $this;
    }

    /**
     * @return value-of<ArticleListItemState>
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param value-of<ArticleListItemState> $value
     */
    public function setState(string $value): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $value
     */
    public function setUpdatedAt(int $value): self
    {
        $this->updatedAt = $value;
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
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param ?int $value
     */
    public function setParentId(?int $value = null): self
    {
        $this->parentId = $value;
        return $this;
    }

    /**
     * @return ?array<int>
     */
    public function getParentIds(): ?array
    {
        return $this->parentIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setParentIds(?array $value = null): self
    {
        $this->parentIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getParentType(): ?string
    {
        return $this->parentType;
    }

    /**
     * @param ?string $value
     */
    public function setParentType(?string $value = null): self
    {
        $this->parentType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDefaultLocale(): ?string
    {
        return $this->defaultLocale;
    }

    /**
     * @param ?string $value
     */
    public function setDefaultLocale(?string $value = null): self
    {
        $this->defaultLocale = $value;
        return $this;
    }

    /**
     * @return ?ArticleTranslatedContent
     */
    public function getTranslatedContent(): ?ArticleTranslatedContent
    {
        return $this->translatedContent;
    }

    /**
     * @param ?ArticleTranslatedContent $value
     */
    public function setTranslatedContent(?ArticleTranslatedContent $value = null): self
    {
        $this->translatedContent = $value;
        return $this;
    }
}
