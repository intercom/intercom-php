<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Contains SLA status at the moment of pausing for conversation part type <code>conversation_sla_paused</code>.
 */
class ConversationSlaPaused extends JsonSerializableType
{
    /**
     * @var ?string $slaName Name of the SLA being paused
     */
    #[JsonProperty('sla_name')]
    private ?string $slaName;

    /**
     * @var ?value-of<ConversationSlaPausedCurrentSlaStatus> $currentSlaStatus Overall SLA status at pause time
     */
    #[JsonProperty('current_sla_status')]
    private ?string $currentSlaStatus;

    /**
     * @var ?array<string, ConversationSlaPausedSlaStatesValue> $slaStates Status of all SLA targets at pause time
     */
    #[JsonProperty('sla_states'), ArrayType(['string' => ConversationSlaPausedSlaStatesValue::class])]
    private ?array $slaStates;

    /**
     * @param array{
     *   slaName?: ?string,
     *   currentSlaStatus?: ?value-of<ConversationSlaPausedCurrentSlaStatus>,
     *   slaStates?: ?array<string, ConversationSlaPausedSlaStatesValue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->slaName = $values['slaName'] ?? null;
        $this->currentSlaStatus = $values['currentSlaStatus'] ?? null;
        $this->slaStates = $values['slaStates'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSlaName(): ?string
    {
        return $this->slaName;
    }

    /**
     * @param ?string $value
     */
    public function setSlaName(?string $value = null): self
    {
        $this->slaName = $value;
        return $this;
    }

    /**
     * @return ?value-of<ConversationSlaPausedCurrentSlaStatus>
     */
    public function getCurrentSlaStatus(): ?string
    {
        return $this->currentSlaStatus;
    }

    /**
     * @param ?value-of<ConversationSlaPausedCurrentSlaStatus> $value
     */
    public function setCurrentSlaStatus(?string $value = null): self
    {
        $this->currentSlaStatus = $value;
        return $this;
    }

    /**
     * @return ?array<string, ConversationSlaPausedSlaStatesValue>
     */
    public function getSlaStates(): ?array
    {
        return $this->slaStates;
    }

    /**
     * @param ?array<string, ConversationSlaPausedSlaStatesValue> $value
     */
    public function setSlaStates(?array $value = null): self
    {
        $this->slaStates = $value;
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
