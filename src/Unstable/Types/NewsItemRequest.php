<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;
use Intercom\Unstable\News\Types\NewsfeedAssignment;

/**
 * A News Item is a content type in Intercom enabling you to announce product updates, company news, promotions, events and more with your customers.
 */
class NewsItemRequest extends JsonSerializableType
{
    /**
     * @var string $title The title of the news item.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var ?string $body The news item body, which may contain HTML.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var int $senderId The id of the sender of the news item. Must be a teammate on the workspace.
     */
    #[JsonProperty('sender_id')]
    private int $senderId;

    /**
     * @var ?value-of<NewsItemRequestState> $state News items will not be visible to your users in the assigned newsfeeds until they are set live.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?bool $deliverSilently When set to `true`, the news item will appear in the messenger newsfeed without showing a notification badge.
     */
    #[JsonProperty('deliver_silently')]
    private ?bool $deliverSilently;

    /**
     * @var ?array<string> $labels Label names displayed to users to categorize the news item.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    private ?array $labels;

    /**
     * @var ?array<?string> $reactions Ordered list of emoji reactions to the news item. When empty, reactions are disabled.
     */
    #[JsonProperty('reactions'), ArrayType([new Union('string', 'null')])]
    private ?array $reactions;

    /**
     * @var ?array<NewsfeedAssignment> $newsfeedAssignments A list of newsfeed_assignments to assign to the specified newsfeed.
     */
    #[JsonProperty('newsfeed_assignments'), ArrayType([NewsfeedAssignment::class])]
    private ?array $newsfeedAssignments;

    /**
     * @param array{
     *   title: string,
     *   senderId: int,
     *   body?: ?string,
     *   state?: ?value-of<NewsItemRequestState>,
     *   deliverSilently?: ?bool,
     *   labels?: ?array<string>,
     *   reactions?: ?array<?string>,
     *   newsfeedAssignments?: ?array<NewsfeedAssignment>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'] ?? null;
        $this->senderId = $values['senderId'];
        $this->state = $values['state'] ?? null;
        $this->deliverSilently = $values['deliverSilently'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->reactions = $values['reactions'] ?? null;
        $this->newsfeedAssignments = $values['newsfeedAssignments'] ?? null;
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
    public function getSenderId(): int
    {
        return $this->senderId;
    }

    /**
     * @param int $value
     */
    public function setSenderId(int $value): self
    {
        $this->senderId = $value;
        return $this;
    }

    /**
     * @return ?value-of<NewsItemRequestState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<NewsItemRequestState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
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
     * @return ?array<string>
     */
    public function getLabels(): ?array
    {
        return $this->labels;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLabels(?array $value = null): self
    {
        $this->labels = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
