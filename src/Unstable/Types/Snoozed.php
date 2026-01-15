<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Date;

/**
 * Contains details about conversation snooze timing for conversation part type <code>snoozed</code>.
 */
class Snoozed extends JsonSerializableType
{
    /**
     * @var ?string $until Human-readable description of snooze duration
     */
    #[JsonProperty('until')]
    private ?string $until;

    /**
     * @var ?DateTime $customUntilTime ISO timestamp for custom snooze times (null for general snoozes)
     */
    #[JsonProperty('custom_until_time'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $customUntilTime;

    /**
     * @param array{
     *   until?: ?string,
     *   customUntilTime?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->until = $values['until'] ?? null;
        $this->customUntilTime = $values['customUntilTime'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUntil(): ?string
    {
        return $this->until;
    }

    /**
     * @param ?string $value
     */
    public function setUntil(?string $value = null): self
    {
        $this->until = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getCustomUntilTime(): ?DateTime
    {
        return $this->customUntilTime;
    }

    /**
     * @param ?DateTime $value
     */
    public function setCustomUntilTime(?DateTime $value = null): self
    {
        $this->customUntilTime = $value;
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
