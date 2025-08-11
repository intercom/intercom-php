<?php

namespace Intercom\Articles\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Articles\Types\UpdateArticleRequestBodyState;
use Intercom\Articles\Types\UpdateArticleRequestBodyParentType;
use Intercom\Types\ArticleTranslatedContent;

class UpdateArticleRequest extends JsonSerializableType
{
    /**
     * @var string $articleId The unique identifier for the article which is given by Intercom.
     */
    private string $articleId;

    /**
     * @var ?string $title The title of the article.For multilingual articles, this will be the title of the default language's content.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $description The description of the article. For multilingual articles, this will be the description of the default language's content.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $body The content of the article. For multilingual articles, this will be the body of the default language's content.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $authorId The id of the author of the article. For multilingual articles, this will be the id of the author of the default language's content. Must be a teammate on the help center's workspace.
     */
    #[JsonProperty('author_id')]
    private ?int $authorId;

    /**
     * @var ?value-of<UpdateArticleRequestBodyState> $state Whether the article will be `published` or will be a `draft`. Defaults to draft. For multilingual articles, this will be the state of the default language's content.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?string $parentId The id of the article's parent collection or section. An article without this field stands alone.
     */
    #[JsonProperty('parent_id')]
    private ?string $parentId;

    /**
     * @var ?value-of<UpdateArticleRequestBodyParentType> $parentType The type of parent, which can either be a `collection` or `section`.
     */
    #[JsonProperty('parent_type')]
    private ?string $parentType;

    /**
     * @var ?ArticleTranslatedContent $translatedContent
     */
    #[JsonProperty('translated_content')]
    private ?ArticleTranslatedContent $translatedContent;

    /**
     * @param array{
     *   articleId: string,
     *   title?: ?string,
     *   description?: ?string,
     *   body?: ?string,
     *   authorId?: ?int,
     *   state?: ?value-of<UpdateArticleRequestBodyState>,
     *   parentId?: ?string,
     *   parentType?: ?value-of<UpdateArticleRequestBodyParentType>,
     *   translatedContent?: ?ArticleTranslatedContent,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->articleId = $values['articleId'];
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->authorId = $values['authorId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->parentId = $values['parentId'] ?? null;
        $this->parentType = $values['parentType'] ?? null;
        $this->translatedContent = $values['translatedContent'] ?? null;
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
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
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
     * @return ?int
     */
    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    /**
     * @param ?int $value
     */
    public function setAuthorId(?int $value = null): self
    {
        $this->authorId = $value;
        return $this;
    }

    /**
     * @return ?value-of<UpdateArticleRequestBodyState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<UpdateArticleRequestBodyState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param ?string $value
     */
    public function setParentId(?string $value = null): self
    {
        $this->parentId = $value;
        return $this;
    }

    /**
     * @return ?value-of<UpdateArticleRequestBodyParentType>
     */
    public function getParentType(): ?string
    {
        return $this->parentType;
    }

    /**
     * @param ?value-of<UpdateArticleRequestBodyParentType> $value
     */
    public function setParentType(?string $value = null): self
    {
        $this->parentType = $value;
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
