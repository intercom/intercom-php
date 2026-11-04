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
     * @var ?string $id The id representing the activity.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?ActivityLogPerformedBy $performedBy Details about the Admin involved in the activity.
     */
    #[JsonProperty('performed_by')]
    private ?ActivityLogPerformedBy $performedBy;

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
     * @var ?value-of<ActivityLogActivityType> $activityType
     */
    #[JsonProperty('activity_type')]
    private ?string $activityType;

    /**
     * @var ?string $activityDescription A sentence or two describing the activity.
     */
    #[JsonProperty('activity_description')]
    private ?string $activityDescription;

    /**
     * @param array{
     *   id?: ?string,
     *   performedBy?: ?ActivityLogPerformedBy,
     *   metadata?: ?ActivityLogMetadata,
     *   createdAt?: ?int,
     *   activityType?: ?value-of<ActivityLogActivityType>,
     *   activityDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->performedBy = $values['performedBy'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->activityType = $values['activityType'] ?? null;
        $this->activityDescription = $values['activityDescription'] ?? null;
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
        $this->_setField('id');
        return $this;
    }

    /**
     * @return ?ActivityLogPerformedBy
     */
    public function getPerformedBy(): ?ActivityLogPerformedBy
    {
        return $this->performedBy;
    }

    /**
     * @param ?ActivityLogPerformedBy $value
     */
    public function setPerformedBy(?ActivityLogPerformedBy $value = null): self
    {
        $this->performedBy = $value;
        $this->_setField('performedBy');
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
        $this->_setField('metadata');
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
        $this->_setField('createdAt');
        return $this;
    }

    /**
     * @return ?value-of<ActivityLogActivityType>
     */
    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    /**
     * @param ?value-of<ActivityLogActivityType> $value
     */
    public function setActivityType(?string $value = null): self
    {
        $this->activityType = $value;
        $this->_setField('activityType');
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
        $this->_setField('activityDescription');
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
