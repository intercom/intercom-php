<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about Custom Data Attributes (CDAs) that were modified by an admin (operator) for conversation part type <code>conversation_attribute_updated_by_admin</code>.
 */
class ConversationAttributeUpdatedByAdmin extends JsonSerializableType
{
    /**
     * @var ?ConversationAttributeUpdatedByAdminAttribute $attribute
     */
    #[JsonProperty('attribute')]
    private ?ConversationAttributeUpdatedByAdminAttribute $attribute;

    /**
     * @var ?ConversationAttributeUpdatedByAdminValue $value
     */
    #[JsonProperty('value')]
    private ?ConversationAttributeUpdatedByAdminValue $value;

    /**
     * @param array{
     *   attribute?: ?ConversationAttributeUpdatedByAdminAttribute,
     *   value?: ?ConversationAttributeUpdatedByAdminValue,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attribute = $values['attribute'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return ?ConversationAttributeUpdatedByAdminAttribute
     */
    public function getAttribute(): ?ConversationAttributeUpdatedByAdminAttribute
    {
        return $this->attribute;
    }

    /**
     * @param ?ConversationAttributeUpdatedByAdminAttribute $value
     */
    public function setAttribute(?ConversationAttributeUpdatedByAdminAttribute $value = null): self
    {
        $this->attribute = $value;
        return $this;
    }

    /**
     * @return ?ConversationAttributeUpdatedByAdminValue
     */
    public function getValue(): ?ConversationAttributeUpdatedByAdminValue
    {
        return $this->value;
    }

    /**
     * @param ?ConversationAttributeUpdatedByAdminValue $value
     */
    public function setValue(?ConversationAttributeUpdatedByAdminValue $value = null): self
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
