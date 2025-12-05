<?php

namespace Intercom\Unstable\News\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A News Item is a content type in Intercom enabling you to announce product updates, company news, promotions, events and more with your customers.
 */
class NewsItem extends JsonSerializableType
{
    /**
     * @var ?'news-item' $type The type of object.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the news item which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $workspaceId The id of the workspace which the news item belongs to.
     */
    #[JsonProperty('workspace_id')]
    private ?string $workspaceId;

    /**
     * @var ?string $title The title of the news item.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $body The news item body, which may contain HTML.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?int $senderId The id of the sender of the news item. Must be a teammate on the workspace.
     */
    #[JsonProperty('sender_id')]
    private ?int $senderId;

    /**
     * @var ?value-of<NewsItemState> $state News items will not be visible to your users in the assigned newsfeeds until they are set live.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?array<NewsfeedAssignment> $newsfeedAssignments A list of newsfeed_assignments to assign to the specified newsfeed.
     */
    #[JsonProperty('newsfeed_assignments'), ArrayType([NewsfeedAssignment::class])]
    private ?array $newsfeedAssignments;

    /**
     * @var ?array<?string> $labels Label names displayed to users to categorize the news item.
     */
    #[JsonProperty('labels'), ArrayType([new Union('string', 'null')])]
    private ?array $labels;

    /**
     * @var ?string $coverImageUrl URL of the image used as cover. Must have .jpg or .png extension.
     */
    #[JsonProperty('cover_image_url')]
    private ?string $coverImageUrl;

    /**
     * @var ?array<?string> $reactions Ordered list of emoji reactions to the news item. When empty, reactions are disabled.
     */
    #[JsonProperty('reactions'), ArrayType([new Union('string', 'null')])]
    private ?array $reactions;

    /**
     * @var ?bool $deliverSilently When set to true, the news item will appear in the messenger newsfeed without showing a notification badge.
     */
    #[JsonProperty('deliver_silently')]
    private ?bool $deliverSilently;

    /**
     * @var ?int $createdAt Timestamp for when the news item was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt Timestamp for when the news item was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   type?: ?'news-item',
     *   id?: ?string,
     *   workspaceId?: ?string,
     *   title?: ?string,
     *   body?: ?string,
     *   senderId?: ?int,
     *   state?: ?value-of<NewsItemState>,
     *   newsfeedAssignments?: ?array<NewsfeedAssignment>,
     *   labels?: ?array<?string>,
     *   coverImageUrl?: ?string,
     *   reactions?: ?array<?string>,
     *   deliverSilently?: ?bool,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->workspaceId = $values['workspaceId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->senderId = $values['senderId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->newsfeedAssignments = $values['newsfeedAssignments'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->coverImageUrl = $values['coverImageUrl'] ?? null;
        $this->reactions = $values['reactions'] ?? null;
        $this->deliverSilently = $values['deliverSilently'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return ?'news-item'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'news-item' $value
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
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * @param ?string $value
     */
    public function setWorkspaceId(?string $value = null): self
    {
        $this->workspaceId = $value;
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
    public function getSenderId(): ?int
    {
        return $this->senderId;
    }

    /**
     * @param ?int $value
     */
    public function setSenderId(?int $value = null): self
    {
        $this->senderId = $value;
        return $this;
    }

    /**
     * @return ?value-of<NewsItemState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<NewsItemState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?array<NewsfeedAssignment>
     */
    public function getNewsfeedAssignments(): ?array
    {
        return $this->newsfeedAssignments;
    }

    /**
     * @param ?array<NewsfeedAssignment> $value
     */
    public function setNewsfeedAssignments(?array $value = null): self
    {
        $this->newsfeedAssignments = $value;
        return $this;
    }

    /**
     * @return ?array<?string>
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }

    /**
     * @param ?array<?string> $value
     */
    public function setLabels(?array $value = null): self
    {
        $this->labels = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCoverImageUrl(): ?string
    {
        return $this->coverImageUrl;
    }

    /**
     * @param ?string $value
     */
    public function setCoverImageUrl(?string $value = null): self
    {
        $this->coverImageUrl = $value;
        return $this;
    }

    /**
     * @return ?array<?string>
     */
    public function getReactions(): ?array
    {
        return $this->reactions;
    }

    /**
     * @param ?array<?string> $value
     */
    public function setReactions(?array $value = null): self
    {
        $this->reactions = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDeliverSilently(): ?bool
    {
        return $this->deliverSilently;
    }

    /**
     * @param ?bool $value
     */
    public function setDeliverSilently(?bool $value = null): self
    {
        $this->deliverSilently = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
