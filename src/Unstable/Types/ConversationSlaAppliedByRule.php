<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about SLA applied by modern Operator workflows for conversation part type <code>conversation_sla_applied_by_rule</code>.
 */
class ConversationSlaAppliedByRule extends JsonSerializableType
{
    /**
     * @var ?string $slaName Name of the SLA that was applied
     */
    #[JsonProperty('sla_name')]
    private ?string $slaName;

    /**
     * @var ?ConversationSlaAppliedByRuleSlaDefinition $slaDefinition Target times configured for the SLA (in seconds)
     */
    #[JsonProperty('sla_definition')]
    private ?ConversationSlaAppliedByRuleSlaDefinition $slaDefinition;

    /**
     * @param array{
     *   slaName?: ?string,
     *   slaDefinition?: ?ConversationSlaAppliedByRuleSlaDefinition,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->slaName = $values['slaName'] ?? null;
        $this->slaDefinition = $values['slaDefinition'] ?? null;
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
     * @return ?ConversationSlaAppliedByRuleSlaDefinition
     */
    public function getSlaDefinition(): ?ConversationSlaAppliedByRuleSlaDefinition
    {
        return $this->slaDefinition;
    }

    /**
     * @param ?ConversationSlaAppliedByRuleSlaDefinition $value
     */
    public function setSlaDefinition(?ConversationSlaAppliedByRuleSlaDefinition $value = null): self
    {
        $this->slaDefinition = $value;
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
