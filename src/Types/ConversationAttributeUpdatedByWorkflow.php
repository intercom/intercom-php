<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about the workflow that was triggered and any Custom Data Attributes (CDAs) that were modified during the workflow execution for conversation part type <code>conversation_attribute_updated_by_workflow</code>.
 */
class ConversationAttributeUpdatedByWorkflow extends JsonSerializableType
{
    /**
     * @var ?ConversationAttributeUpdatedByWorkflowWorkflow $workflow
     */
    #[JsonProperty('workflow')]
    private ?ConversationAttributeUpdatedByWorkflowWorkflow $workflow;

    /**
     * @var ?ConversationAttributeUpdatedByWorkflowAttribute $attribute
     */
    #[JsonProperty('attribute')]
    private ?ConversationAttributeUpdatedByWorkflowAttribute $attribute;

    /**
     * @var ?ConversationAttributeUpdatedByWorkflowValue $value
     */
    #[JsonProperty('value')]
    private ?ConversationAttributeUpdatedByWorkflowValue $value;

    /**
     * @param array{
     *   workflow?: ?ConversationAttributeUpdatedByWorkflowWorkflow,
     *   attribute?: ?ConversationAttributeUpdatedByWorkflowAttribute,
     *   value?: ?ConversationAttributeUpdatedByWorkflowValue,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->workflow = $values['workflow'] ?? null;
        $this->attribute = $values['attribute'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?ConversationAttributeUpdatedByWorkflowWorkflow
     */
    public function getWorkflow(): ?ConversationAttributeUpdatedByWorkflowWorkflow
    {
        return $this->workflow;
    }

    /**
     * @param ?ConversationAttributeUpdatedByWorkflowWorkflow $value
     */
    public function setWorkflow(?ConversationAttributeUpdatedByWorkflowWorkflow $value = null): self
    {
        $this->workflow = $value;
        return $this;
    }

    /**
     * @return ?ConversationAttributeUpdatedByWorkflowAttribute
     */
    public function getAttribute(): ?ConversationAttributeUpdatedByWorkflowAttribute
    {
        return $this->attribute;
    }

    /**
     * @param ?ConversationAttributeUpdatedByWorkflowAttribute $value
     */
    public function setAttribute(?ConversationAttributeUpdatedByWorkflowAttribute $value = null): self
    {
        $this->attribute = $value;
        return $this;
    }

    /**
     * @return ?ConversationAttributeUpdatedByWorkflowValue
     */
    public function getValue(): ?ConversationAttributeUpdatedByWorkflowValue
    {
        return $this->value;
    }

    /**
     * @param ?ConversationAttributeUpdatedByWorkflowValue $value
     */
    public function setValue(?ConversationAttributeUpdatedByWorkflowValue $value = null): self
    {
        $this->value = $value;
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
