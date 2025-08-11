<?php

namespace Intercom\Unstable\News\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Assigns a news item to a newsfeed.
 */
class NewsfeedAssignment extends JsonSerializableType
{
    /**
     * @var ?int $newsfeedId The unique identifier for the newsfeed which is given by Intercom. Publish dates cannot be in the future, to schedule news items use the dedicated feature in app (see this article).
     */
    #[JsonProperty('newsfeed_id')]
    private ?int $newsfeedId;

    /**
     * @var ?int $publishedAt Publish date of the news item on the newsfeed, use this field if you want to set a publish date in the past (e.g. when importing existing news items). On write, this field will be ignored if the news item state is "draft".
     */
    #[JsonProperty('published_at')]
    private ?int $publishedAt;

    /**
     * @param array{
     *   newsfeedId?: ?int,
     *   publishedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->newsfeedId = $values['newsfeedId'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getNewsfeedId(): ?int
    {
        return $this->newsfeedId;
    }

    /**
     * @param ?int $value
     */
    public function setNewsfeedId(?int $value = null): self
    {
        $this->newsfeedId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPublishedAt(): ?int
    {
        return $this->publishedAt;
    }

    /**
     * @param ?int $value
     */
    public function setPublishedAt(?int $value = null): self
    {
        $this->publishedAt = $value;
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
