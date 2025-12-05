<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Content of an Article.
 */
class ArticleContent extends JsonSerializableType
{
    /**
     * @var ?'article_content' $type The type of object - `article_content` .
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $title The title of the article.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $description The description of the article.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $body The body of the article.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $authorId The ID of the author of the article.
     */
    #[JsonProperty('author_id')]
    private ?int $authorId;

    /**
     * @var ?value-of<ArticleContentState> $state Whether the article is `published` or is a `draft` .
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?int $createdAt The time when the article was created (seconds).
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time when the article was last updated (seconds).
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $url The URL of the article.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @param array{
     *   type?: ?'article_content',
     *   title?: ?string,
     *   description?: ?string,
     *   body?: ?string,
     *   authorId?: ?int,
     *   state?: ?value-of<ArticleContentState>,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->authorId = $values['authorId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return ?'article_content'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'article_content' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
     * @return ?value-of<ArticleContentState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<ArticleContentState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
