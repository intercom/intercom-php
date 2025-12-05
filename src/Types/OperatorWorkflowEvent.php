<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about name of the workflow for conversation part type <code>operator_workflow_event</code>.
 */
class OperatorWorkflowEvent extends JsonSerializableType
{
    /**
     * @var ?OperatorWorkflowEventWorkflow $workflow
     */
    #[JsonProperty('workflow')]
    private ?OperatorWorkflowEventWorkflow $workflow;

    /**
     * @var ?OperatorWorkflowEventEvent $event
     */
    #[JsonProperty('event')]
    private ?OperatorWorkflowEventEvent $event;

    /**
     * @param array{
     *   workflow?: ?OperatorWorkflowEventWorkflow,
     *   event?: ?OperatorWorkflowEventEvent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->workflow = $values['workflow'] ?? null;
        $this->event = $values['event'] ?? null;
    }

    /**
     * @return ?OperatorWorkflowEventWorkflow
     */
    public function getWorkflow(): ?OperatorWorkflowEventWorkflow
    {
        return $this->workflow;
    }

    /**
     * @param ?OperatorWorkflowEventWorkflow $value
     */
    public function setWorkflow(?OperatorWorkflowEventWorkflow $value = null): self
    {
        $this->workflow = $value;
        return $this;
    }

    /**
     * @return ?OperatorWorkflowEventEvent
     */
    public function getEvent(): ?OperatorWorkflowEventEvent
    {
        return $this->event;
    }

    /**
     * @param ?OperatorWorkflowEventEvent $value
     */
    public function setEvent(?OperatorWorkflowEventEvent $value = null): self
    {
        $this->event = $value;
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
