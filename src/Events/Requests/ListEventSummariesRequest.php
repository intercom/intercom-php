<?php

namespace Intercom\Events\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Events\Types\CreateDataEventSummariesRequestEventSummaries;

class ListEventSummariesRequest extends JsonSerializableType
{
    /**
     * @var ?string $userId Your identifier for the user.
     */
    #[JsonProperty('user_id')]
    private ?string $userId;

    /**
     * @var ?CreateDataEventSummariesRequestEventSummaries $eventSummaries A list of event summaries for the user. Each event summary should contain the event name, the time the event occurred, and the number of times the event occurred. The event name should be a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
     */
    #[JsonProperty('event_summaries')]
    private ?CreateDataEventSummariesRequestEventSummaries $eventSummaries;

    /**
     * @param array{
     *   userId?: ?string,
     *   eventSummaries?: ?CreateDataEventSummariesRequestEventSummaries,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->userId = $values['userId'] ?? null;
        $this->eventSummaries = $values['eventSummaries'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param ?string $value
     */
    public function setUserId(?string $value = null): self
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @return ?CreateDataEventSummariesRequestEventSummaries
     */
    public function getEventSummaries(): ?CreateDataEventSummariesRequestEventSummaries
    {
        return $this->eventSummaries;
    }

    /**
     * @param ?CreateDataEventSummariesRequestEventSummaries $value
     */
    public function setEventSummaries(?CreateDataEventSummariesRequestEventSummaries $value = null): self
    {
        $this->eventSummaries = $value;
        return $this;
    }
}
