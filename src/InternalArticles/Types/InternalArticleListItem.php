<?php

namespace Intercom\InternalArticles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The data returned about your internal articles when you list them.
 */
class InternalArticleListItem extends JsonSerializableType
{
    /**
     * @var ?'internal_article' $type The type of object - `internal_article`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the article which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $title The title of the article.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $body The body of the article in HTML.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $ownerId The id of the owner of the article.
     */
    #[JsonProperty('owner_id')]
    private ?int $ownerId;

    /**
     * @var ?int $authorId The id of the author of the article.
     */
    #[JsonProperty('author_id')]
    private ?int $authorId;

    /**
     * @var ?int $createdAt The time when the article was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time when the article was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $locale The default locale of the article.
     */
    #[JsonProperty('locale')]
    private ?string $locale;

    /**
     * @param array{
     *   type?: ?'internal_article',
     *   id?: ?string,
     *   title?: ?string,
     *   body?: ?string,
     *   ownerId?: ?int,
     *   authorId?: ?int,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   locale?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->ownerId = $values['ownerId'] ?? null;
        $this->authorId = $values['authorId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->locale = $values['locale'] ?? null;
    }

    /**
     * @return ?'internal_article'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'internal_article' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
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
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param ?int $value
     */
    public function setOwnerId(?int $value = null): self
    {
        $this->ownerId = $value;
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
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param ?string $value
     */
    public function setLocale(?string $value = null): self
    {
        $this->locale = $value;
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
