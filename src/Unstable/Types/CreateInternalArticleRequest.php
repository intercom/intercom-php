<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * You can create an Internal Article
 */
class CreateInternalArticleRequest extends JsonSerializableType
{
    /**
     * @var string $title The title of the article.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var ?string $body The content of the article.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var int $authorId The id of the author of the article.
     */
    #[JsonProperty('author_id')]
    private int $authorId;

    /**
     * @var int $ownerId The id of the owner of the article.
     */
    #[JsonProperty('owner_id')]
    private int $ownerId;

    /**
     * @param array{
     *   title: string,
     *   authorId: int,
     *   ownerId: int,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'] ?? null;
        $this->authorId = $values['authorId'];
        $this->ownerId = $values['ownerId'];
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
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @param int $value
     */
    public function setOwnerId(int $value): self
    {
        $this->ownerId = $value;
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
