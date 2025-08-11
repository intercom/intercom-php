<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * This will return a summary of data events for the App.
 */
class DataEventSummary extends JsonSerializableType
{
    /**
     * @var ?'event.summary' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $email The email address of the user
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $intercomUserId The Intercom user ID of the user
     */
    #[JsonProperty('intercom_user_id')]
    private ?string $intercomUserId;

    /**
     * @var ?string $userId The user ID of the user
     */
    #[JsonProperty('user_id')]
    private ?string $userId;

    /**
     * @var ?array<?DataEventSummaryItem> $events A summary of data events
     */
    #[JsonProperty('events'), ArrayType([new Union(DataEventSummaryItem::class, 'null')])]
    private ?array $events;

    /**
     * @param array{
     *   type?: ?'event.summary',
     *   email?: ?string,
     *   intercomUserId?: ?string,
     *   userId?: ?string,
     *   events?: ?array<?DataEventSummaryItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->intercomUserId = $values['intercomUserId'] ?? null;
        $this->userId = $values['userId'] ?? null;
        $this->events = $values['events'] ?? null;
    }

    /**
     * @return ?'event.summary'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'event.summary' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIntercomUserId(): ?string
    {
        return $this->intercomUserId;
    }

    /**
     * @param ?string $value
     */
    public function setIntercomUserId(?string $value = null): self
    {
        $this->intercomUserId = $value;
        return $this;
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
     * @return ?array<?DataEventSummaryItem>
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param ?array<?DataEventSummaryItem> $value
     */
    public function setEvents(?array $value = null): self
    {
        $this->events = $value;
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
