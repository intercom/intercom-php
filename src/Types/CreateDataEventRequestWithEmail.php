<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class CreateDataEventRequestWithEmail extends JsonSerializableType
{
    /**
     * @var string $email An email address for your user. An email should only be used where your application uses email to uniquely identify users.
     */
    #[JsonProperty('email')]
    private string $email;

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
     *   email: string,
     *   eventName: string,
     *   createdAt: int,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->eventName = $values['eventName'];
        $this->createdAt = $values['createdAt'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
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
