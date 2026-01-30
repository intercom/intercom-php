<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about Custom Data Attributes (CDAs) that were modified by a user for conversation part type <code>conversation_attribute_updated_by_user</code>.
 */
class ConversationAttributeUpdatedByUser extends JsonSerializableType
{
    /**
     * @var ?ConversationAttributeUpdatedByUserAttribute $attribute
     */
    #[JsonProperty('attribute')]
    private ?ConversationAttributeUpdatedByUserAttribute $attribute;

    /**
     * @var ?ConversationAttributeUpdatedByUserValue $value
     */
    #[JsonProperty('value')]
    private ?ConversationAttributeUpdatedByUserValue $value;

    /**
     * @param array{
     *   attribute?: ?ConversationAttributeUpdatedByUserAttribute,
     *   value?: ?ConversationAttributeUpdatedByUserValue,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attribute = $values['attribute'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?ConversationAttributeUpdatedByUserAttribute
     */
    public function getAttribute(): ?ConversationAttributeUpdatedByUserAttribute
    {
        return $this->attribute;
    }

    /**
     * @param ?ConversationAttributeUpdatedByUserAttribute $value
     */
    public function setAttribute(?ConversationAttributeUpdatedByUserAttribute $value = null): self
    {
        $this->attribute = $value;
        return $this;
    }

    /**
     * @return ?ConversationAttributeUpdatedByUserValue
     */
    public function getValue(): ?ConversationAttributeUpdatedByUserValue
    {
        return $this->value;
    }

    /**
     * @param ?ConversationAttributeUpdatedByUserValue $value
     */
    public function setValue(?ConversationAttributeUpdatedByUserValue $value = null): self
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
