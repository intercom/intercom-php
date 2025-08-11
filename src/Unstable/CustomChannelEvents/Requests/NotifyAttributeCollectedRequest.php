<?php

namespace Intercom\Unstable\CustomChannelEvents\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Traits\CustomChannelBaseEvent;
use Intercom\Unstable\Types\CustomChannelAttribute;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\CustomChannelContact;

class NotifyAttributeCollectedRequest extends JsonSerializableType
{
    use CustomChannelBaseEvent;

    /**
     * @var CustomChannelAttribute $attribute
     */
    #[JsonProperty('attribute')]
    private CustomChannelAttribute $attribute;

    /**
     * @param array{
     *   attribute: CustomChannelAttribute,
     *   eventId: string,
     *   externalConversationId: string,
     *   contact: CustomChannelContact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attribute = $values['attribute'];
        $this->eventId = $values['eventId'];
        $this->externalConversationId = $values['externalConversationId'];
        $this->contact = $values['contact'];
    }

    /**
     * @return CustomChannelAttribute
     */
    public function getAttribute(): CustomChannelAttribute
    {
        return $this->attribute;
    }

    /**
     * @param CustomChannelAttribute $value
     */
    public function setAttribute(CustomChannelAttribute $value): self
    {
        $this->attribute = $value;
        return $this;
    }
}
