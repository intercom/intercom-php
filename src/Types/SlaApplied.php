<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The SLA Applied object contains the details for which SLA has been applied to this conversation.
 * Important: if there are any canceled sla_events for the conversation - meaning an SLA has been manually removed from a conversation, the sla_status will always be returned as null.
 */
class SlaApplied extends JsonSerializableType
{
    /**
     * @var string $type object type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $slaName The name of the SLA as given by the teammate when it was created.
     */
    #[JsonProperty('sla_name')]
    private string $slaName;

    /**
     * SLA statuses:
     *             - `hit`: If there’s at least one hit event in the underlying sla_events table, and no “missed” or “canceled” events for the conversation.
     *             - `missed`: If there are any missed sla_events for the conversation and no canceled events. If there’s even a single missed sla event, the status will always be missed. A missed status is not applied when the SLA expires, only the next time a teammate replies.
     *             - `active`: An SLA has been applied to a conversation, but has not yet been fulfilled. SLA status is active only if there are no “hit, “missed”, or “canceled” events.
     *
     * @var value-of<SlaAppliedSlaStatus> $slaStatus
     */
    #[JsonProperty('sla_status')]
    private string $slaStatus;

    /**
     * @param array{
     *   type: string,
     *   slaName: string,
     *   slaStatus: value-of<SlaAppliedSlaStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->slaName = $values['slaName'];
        $this->slaStatus = $values['slaStatus'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlaName(): string
    {
        return $this->slaName;
    }

    /**
     * @param string $value
     */
    public function setSlaName(string $value): self
    {
        $this->slaName = $value;
        return $this;
    }

    /**
     * @return value-of<SlaAppliedSlaStatus>
     */
    public function getSlaStatus(): string
    {
        return $this->slaStatus;
    }

    /**
     * @param value-of<SlaAppliedSlaStatus> $value
     */
    public function setSlaStatus(string $value): self
    {
        $this->slaStatus = $value;
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
