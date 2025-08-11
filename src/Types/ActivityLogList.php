<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A paginated list of activity logs.
 */
class ActivityLogList extends JsonSerializableType
{
    /**
     * @var 'activity_log.list' $type String representing the object's type. Always has the value `activity_log.list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @var array<ActivityLog> $activityLogs An array of activity logs
     */
    #[JsonProperty('activity_logs'), ArrayType([ActivityLog::class])]
    private array $activityLogs;

    /**
     * @param array{
     *   type: 'activity_log.list',
     *   activityLogs: array<ActivityLog>,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->pages = $values['pages'] ?? null;
        $this->activityLogs = $values['activityLogs'];
    }

    /**
     * @return 'activity_log.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'activity_log.list' $value
     */
    public function setType(string $value): self
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
     * @return array<ActivityLog>
     */
    public function getActivityLogs(): array
    {
        return $this->activityLogs;
    }

    /**
     * @param array<ActivityLog> $value
     */
    public function setActivityLogs(array $value): self
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
