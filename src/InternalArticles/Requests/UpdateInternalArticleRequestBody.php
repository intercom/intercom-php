<?php

namespace Intercom\InternalArticles\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UpdateInternalArticleRequestBody extends JsonSerializableType
{
    /**
     * @var int $internalArticleId The unique identifier for the internal article which is given by Intercom.
     */
    private int $internalArticleId;

    /**
     * @var ?string $title The title of the article.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $body The content of the article.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $authorId The id of the author of the article.
     */
    #[JsonProperty('author_id')]
    private ?int $authorId;

    /**
     * @var ?int $ownerId The id of the author of the article.
     */
    #[JsonProperty('owner_id')]
    private ?int $ownerId;

    /**
     * @param array{
     *   internalArticleId: int,
     *   title?: ?string,
     *   body?: ?string,
     *   authorId?: ?int,
     *   ownerId?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->internalArticleId = $values['internalArticleId'];
        $this->title = $values['title'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->authorId = $values['authorId'] ?? null;
        $this->ownerId = $values['ownerId'] ?? null;
    }

    /**
     * @return int
     */
    public function getInternalArticleId(): int
    {
        return $this->internalArticleId;
    }

    /**
     * @param int $value
     */
    public function setInternalArticleId(int $value): self
    {
        $this->internalArticleId = $value;
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
}
