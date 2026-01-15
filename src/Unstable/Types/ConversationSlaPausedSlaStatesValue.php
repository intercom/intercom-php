<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConversationSlaPausedSlaStatesValue extends JsonSerializableType
{
    /**
     * @var ?'paused' $status Status of this specific target (always paused)
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?int $secondsRemaining Time remaining when paused
     */
    #[JsonProperty('seconds_remaining')]
    private ?int $secondsRemaining;

    /**
     * @param array{
     *   status?: ?'paused',
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
     * @return ?'paused'
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?'paused' $value
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
