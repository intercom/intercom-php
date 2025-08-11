<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class CreateDataEventRequestWithUserId extends JsonSerializableType
{
    /**
     * @var string $userId Your identifier for the user.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @var string $eventName The name of the event that occurred. This is presented to your App's admins when filtering and creating segments - a good event name is typically a past tense 'verb-noun' combination, to improve readability, for example `updated-plan`.
     */
    #[JsonProperty('event_name')]
    private string $eventName;

    /**
     * @var int $createdAt The time the event occurred as a UTC Unix timestamp
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?array<string, string> $metadata Optional metadata about the event.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    private ?array $metadata;

    /**
     * @param array{
     *   userId: string,
     *   eventName: string,
     *   createdAt: int,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->eventName = $values['eventName'];
        $this->createdAt = $values['createdAt'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $value
     */
    public function setEventName(string $value): self
    {
        $this->eventName = $value;
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
     * @return ?array<string, string>
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param ?array<string, string> $value
     */
    public function setMetadata(?array $value = null): self
    {
        $this->metadata = $value;
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
