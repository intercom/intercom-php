<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Activities performed by Admins.
 */
class ActivityLog extends JsonSerializableType
{
    /**
     * @var string $id The id representing the activity.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var ActivityLogPerformedBy $performedBy Details about the Admin involved in the activity.
     */
    #[JsonProperty('performed_by')]
    private ActivityLogPerformedBy $performedBy;

    /**
     * @var ?ActivityLogMetadata $metadata
     */
    #[JsonProperty('metadata')]
    private ?ActivityLogMetadata $metadata;

    /**
     * @var ?int $createdAt The time the activity was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var value-of<ActivityLogActivityType> $activityType
     */
    #[JsonProperty('activity_type')]
    private string $activityType;

    /**
     * @var ?string $activityDescription A sentence or two describing the activity.
     */
    #[JsonProperty('activity_description')]
    private ?string $activityDescription;

    /**
     * @param array{
     *   id: string,
     *   performedBy: ActivityLogPerformedBy,
     *   activityType: value-of<ActivityLogActivityType>,
     *   metadata?: ?ActivityLogMetadata,
     *   createdAt?: ?int,
     *   activityDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->performedBy = $values['performedBy'];
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->activityType = $values['activityType'];
        $this->activityDescription = $values['activityDescription'] ?? null;
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
     * @return ActivityLogPerformedBy
     */
    public function getPerformedBy(): ActivityLogPerformedBy
    {
        return $this->performedBy;
    }

    /**
     * @param ActivityLogPerformedBy $value
     */
    public function setPerformedBy(ActivityLogPerformedBy $value): self
    {
        $this->performedBy = $value;
        return $this;
    }

    /**
     * @return ?ActivityLogMetadata
     */
    public function getMetadata(): ?ActivityLogMetadata
    {
        return $this->metadata;
    }

    /**
     * @param ?ActivityLogMetadata $value
     */
    public function setMetadata(?ActivityLogMetadata $value = null): self
    {
        $this->metadata = $value;
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
     * @return value-of<ActivityLogActivityType>
     */
    public function getActivityType(): string
    {
        return $this->activityType;
    }

    /**
     * @param value-of<ActivityLogActivityType> $value
     */
    public function setActivityType(string $value): self
    {
        $this->activityType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getActivityDescription(): ?string
    {
        return $this->activityDescription;
    }

    /**
     * @param ?string $value
     */
    public function setActivityDescription(?string $value = null): self
    {
        $this->activityDescription = $value;
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
