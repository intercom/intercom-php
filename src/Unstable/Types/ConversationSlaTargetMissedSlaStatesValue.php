<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConversationSlaTargetMissedSlaStatesValue extends JsonSerializableType
{
    /**
     * @var ?value-of<ConversationSlaTargetMissedSlaStatesValueStatus> $status Status of this specific target
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?int $secondsRemaining Time remaining for active/paused targets (null for hit/missed)
     */
    #[JsonProperty('seconds_remaining')]
    private ?int $secondsRemaining;

    /**
     * @param array{
     *   status?: ?value-of<ConversationSlaTargetMissedSlaStatesValueStatus>,
     *   secondsRemaining?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->secondsRemaining = $values['secondsRemaining'] ?? null;
    }

    /**
     * @return ?value-of<ConversationSlaTargetMissedSlaStatesValueStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<ConversationSlaTargetMissedSlaStatesValueStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSecondsRemaining(): ?int
    {
        return $this->secondsRemaining;
    }

    /**
     * @param ?int $value
     */
    public function setSecondsRemaining(?int $value = null): self
    {
        $this->secondsRemaining = $value;
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
