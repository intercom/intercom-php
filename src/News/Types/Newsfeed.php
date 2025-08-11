<?php

namespace Intercom\News\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A newsfeed is a collection of news items, targeted to a specific audience.
 *
 * Newsfeeds currently cannot be edited through the API, please refer to [this article](https://www.intercom.com/help/en/articles/6362267-getting-started-with-news) to set up your newsfeeds in Intercom.
 */
class Newsfeed extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the newsfeed which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var 'newsfeed' $type The type of object.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $name The name of the newsfeed. This name will never be visible to your users.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var int $createdAt Timestamp for when the newsfeed was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt Timestamp for when the newsfeed was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   type: 'newsfeed',
     *   name: string,
     *   createdAt: int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
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
     * @return 'newsfeed'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'newsfeed' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
