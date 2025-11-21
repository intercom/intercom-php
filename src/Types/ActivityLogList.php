<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A paginated list of activity logs.
 */
class ActivityLogList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `activity_log.list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @var ?array<?ActivityLog> $activityLogs An array of activity logs
     */
    #[JsonProperty('activity_logs'), ArrayType([new Union(ActivityLog::class, 'null')])]
    private ?array $activityLogs;

    /**
     * @param array{
     *   type?: ?string,
     *   pages?: ?CursorPages,
     *   activityLogs?: ?array<?ActivityLog>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->pages = $values['pages'] ?? null;
        $this->activityLogs = $values['activityLogs'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?CursorPages
     */
    public function getPages(): ?CursorPages
    {
        return $this->pages;
    }

    /**
     * @param ?CursorPages $value
     */
    public function setPages(?CursorPages $value = null): self
    {
        $this->pages = $value;
        return $this;
    }

    /**
     * @return ?array<?ActivityLog>
     */
    public function getActivityLogs(): ?array
    {
        return $this->activityLogs;
    }

    /**
     * @param ?array<?ActivityLog> $value
     */
    public function setActivityLogs(?array $value = null): self
    {
        $this->activityLogs = $value;
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
