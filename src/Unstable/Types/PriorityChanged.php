<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about priority changes for conversation part type <code>priority_changed</code>.
 */
class PriorityChanged extends JsonSerializableType
{
    /**
     * @var ?value-of<PriorityChangedCurrentPriority> $currentPriority Current priority state
     */
    #[JsonProperty('current_priority')]
    private ?string $currentPriority;

    /**
     * @var ?value-of<PriorityChangedPreviousPriority> $previousPriority Previous priority state
     */
    #[JsonProperty('previous_priority')]
    private ?string $previousPriority;

    /**
     * @param array{
     *   currentPriority?: ?value-of<PriorityChangedCurrentPriority>,
     *   previousPriority?: ?value-of<PriorityChangedPreviousPriority>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentPriority = $values['currentPriority'] ?? null;
        $this->previousPriority = $values['previousPriority'] ?? null;
    }

    /**
     * @return ?value-of<PriorityChangedCurrentPriority>
     */
    public function getCurrentPriority(): ?string
    {
        return $this->currentPriority;
    }

    /**
     * @param ?value-of<PriorityChangedCurrentPriority> $value
     */
    public function setCurrentPriority(?string $value = null): self
    {
        $this->currentPriority = $value;
        return $this;
    }

    /**
     * @return ?value-of<PriorityChangedPreviousPriority>
     */
    public function getPreviousPriority(): ?string
    {
        return $this->previousPriority;
    }

    /**
     * @param ?value-of<PriorityChangedPreviousPriority> $value
     */
    public function setPreviousPriority(?string $value = null): self
    {
        $this->previousPriority = $value;
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
