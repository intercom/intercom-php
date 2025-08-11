<?php

namespace Intercom\Unstable\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The updated attribute data of the ticket part. Only present for attribute update parts.
 */
class TicketPartUpdatedAttributeData extends JsonSerializableType
{
    /**
     * @var TicketPartUpdatedAttributeDataAttribute $attribute Information about the attribute that was updated.
     */
    #[JsonProperty('attribute')]
    private TicketPartUpdatedAttributeDataAttribute $attribute;

    /**
     * @var TicketPartUpdatedAttributeDataValue $value The new value of the attribute.
     */
    #[JsonProperty('value')]
    private TicketPartUpdatedAttributeDataValue $value;

    /**
     * @param array{
     *   attribute: TicketPartUpdatedAttributeDataAttribute,
     *   value: TicketPartUpdatedAttributeDataValue,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attribute = $values['attribute'];
        $this->value = $values['value'];
    }

    /**
     * @return TicketPartUpdatedAttributeDataAttribute
     */
    public function getAttribute(): TicketPartUpdatedAttributeDataAttribute
    {
        return $this->attribute;
    }

    /**
     * @param TicketPartUpdatedAttributeDataAttribute $value
     */
    public function setAttribute(TicketPartUpdatedAttributeDataAttribute $value): self
    {
        $this->attribute = $value;
        return $this;
    }

    /**
     * @return TicketPartUpdatedAttributeDataValue
     */
    public function getValue(): TicketPartUpdatedAttributeDataValue
    {
        return $this->value;
    }

    /**
     * @param TicketPartUpdatedAttributeDataValue $value
     */
    public function setValue(TicketPartUpdatedAttributeDataValue $value): self
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
