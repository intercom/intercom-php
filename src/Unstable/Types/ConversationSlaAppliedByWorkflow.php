<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about SLA applied by legacy Inbox Rules for conversation part type <code>conversation_sla_applied_by_workflow</code>.
 */
class ConversationSlaAppliedByWorkflow extends JsonSerializableType
{
    /**
     * @var ?string $slaName Name of the SLA that was applied
     */
    #[JsonProperty('sla_name')]
    private ?string $slaName;

    /**
     * @var ?ConversationSlaAppliedByWorkflowSlaDefinition $slaDefinition Target times configured for the SLA (in seconds)
     */
    #[JsonProperty('sla_definition')]
    private ?ConversationSlaAppliedByWorkflowSlaDefinition $slaDefinition;

    /**
     * @param array{
     *   slaName?: ?string,
     *   slaDefinition?: ?ConversationSlaAppliedByWorkflowSlaDefinition,
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
     * @return ?ConversationSlaAppliedByWorkflowSlaDefinition
     */
    public function getSlaDefinition(): ?ConversationSlaAppliedByWorkflowSlaDefinition
    {
        return $this->slaDefinition;
    }

    /**
     * @param ?ConversationSlaAppliedByWorkflowSlaDefinition $value
     */
    public function setSlaDefinition(?ConversationSlaAppliedByWorkflowSlaDefinition $value = null): self
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
