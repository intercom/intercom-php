<?php

namespace Intercom\DataEvents\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Data events are used to notify Intercom of changes to your data.
 */
class DataEvent extends JsonSerializableType
{
    /**
     * @var ?'event' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

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
     * @var ?string $userId Your identifier for the user.
     */
    #[JsonProperty('user_id')]
    private ?string $userId;

    /**
     * @var ?string $id Your identifier for a lead or a user.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $intercomUserId The Intercom identifier for the user.
     */
    #[JsonProperty('intercom_user_id')]
    private ?string $intercomUserId;

    /**
     * @var ?string $email An email address for your user. An email should only be used where your application uses email to uniquely identify users.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?array<string, string> $metadata Optional metadata about the event.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    private ?array $metadata;

    /**
     * @param array{
     *   eventName: string,
     *   createdAt: int,
     *   type?: ?'event',
     *   userId?: ?string,
     *   id?: ?string,
     *   intercomUserId?: ?string,
     *   email?: ?string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->eventName = $values['eventName'];
        $this->createdAt = $values['createdAt'];
        $this->userId = $values['userId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->intercomUserId = $values['intercomUserId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return ?'event'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'event' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        $this->_setField('type');
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
        $this->_setField('eventName');
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
        $this->_setField('createdAt');
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
        $this->_setField('userId');
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
        $this->_setField('id');
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
        $this->_setField('intercomUserId');
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
        $this->_setField('email');
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
        $this->_setField('metadata');
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
