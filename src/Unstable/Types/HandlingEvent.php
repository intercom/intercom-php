<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Date;

/**
 * A pause or resume event for a conversation
 */
class HandlingEvent extends JsonSerializableType
{
    /**
     * @var TeammateReference $teammate
     */
    #[JsonProperty('teammate')]
    private TeammateReference $teammate;

    /**
     * @var value-of<HandlingEventType> $type The type of handling event
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var DateTime $timestamp ISO8601 timestamp when the event occurred
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    private DateTime $timestamp;

    /**
     * @var ?string $reason Optional reason for the event (e.g., "Paused", "Away")
     */
    #[JsonProperty('reason')]
    private ?string $reason;

    /**
     * @param array{
     *   teammate: TeammateReference,
     *   type: value-of<HandlingEventType>,
     *   timestamp: DateTime,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teammate = $values['teammate'];
        $this->type = $values['type'];
        $this->timestamp = $values['timestamp'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return TeammateReference
     */
    public function getTeammate(): TeammateReference
    {
        return $this->teammate;
    }

    /**
     * @param TeammateReference $value
     */
    public function setTeammate(TeammateReference $value): self
    {
        $this->teammate = $value;
        return $this;
    }

    /**
     * @return value-of<HandlingEventType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<HandlingEventType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param DateTime $value
     */
    public function setTimestamp(DateTime $value): self
    {
        $this->timestamp = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param ?string $value
     */
    public function setReason(?string $value = null): self
    {
        $this->reason = $value;
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
