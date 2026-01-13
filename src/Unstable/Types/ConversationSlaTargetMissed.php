<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Contains complete status of all SLA targets when a breach occurs for conversation part type <code>conversation_sla_target_missed</code>.
 */
class ConversationSlaTargetMissed extends JsonSerializableType
{
    /**
     * @var ?string $slaName Name of the SLA
     */
    #[JsonProperty('sla_name')]
    private ?string $slaName;

    /**
     * @var ?value-of<ConversationSlaTargetMissedSlaTargetType> $slaTargetType Which specific target was missed
     */
    #[JsonProperty('sla_target_type')]
    private ?string $slaTargetType;

    /**
     * @var ?value-of<ConversationSlaTargetMissedCurrentSlaStatus> $currentSlaStatus Overall SLA status
     */
    #[JsonProperty('current_sla_status')]
    private ?string $currentSlaStatus;

    /**
     * @var ?array<string, ConversationSlaTargetMissedSlaStatesValue> $slaStates Status of all SLA targets at the time of breach
     */
    #[JsonProperty('sla_states'), ArrayType(['string' => ConversationSlaTargetMissedSlaStatesValue::class])]
    private ?array $slaStates;

    /**
     * @param array{
     *   slaName?: ?string,
     *   slaTargetType?: ?value-of<ConversationSlaTargetMissedSlaTargetType>,
     *   currentSlaStatus?: ?value-of<ConversationSlaTargetMissedCurrentSlaStatus>,
     *   slaStates?: ?array<string, ConversationSlaTargetMissedSlaStatesValue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->slaName = $values['slaName'] ?? null;
        $this->slaTargetType = $values['slaTargetType'] ?? null;
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
     * @return ?value-of<ConversationSlaTargetMissedSlaTargetType>
     */
    public function getSlaTargetType(): ?string
    {
        return $this->slaTargetType;
    }

    /**
     * @param ?value-of<ConversationSlaTargetMissedSlaTargetType> $value
     */
    public function setSlaTargetType(?string $value = null): self
    {
        $this->slaTargetType = $value;
        return $this;
    }

    /**
     * @return ?value-of<ConversationSlaTargetMissedCurrentSlaStatus>
     */
    public function getCurrentSlaStatus(): ?string
    {
        return $this->currentSlaStatus;
    }

    /**
     * @param ?value-of<ConversationSlaTargetMissedCurrentSlaStatus> $value
     */
    public function setCurrentSlaStatus(?string $value = null): self
    {
        $this->currentSlaStatus = $value;
        return $this;
    }

    /**
     * @return ?array<string, ConversationSlaTargetMissedSlaStatesValue>
     */
    public function getSlaStates(): ?array
    {
        return $this->slaStates;
    }

    /**
     * @param ?array<string, ConversationSlaTargetMissedSlaStatesValue> $value
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
