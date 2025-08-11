<?php

namespace Intercom\Unstable\CustomChannelEvents\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Traits\CustomChannelBaseEvent;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\CustomChannelContact;

class NotifyQuickReplySelectedRequest extends JsonSerializableType
{
    use CustomChannelBaseEvent;

    /**
     * @var string $quickReplyOptionId Id of the selected quick reply option.
     */
    #[JsonProperty('quick_reply_option_id')]
    private string $quickReplyOptionId;

    /**
     * @param array{
     *   quickReplyOptionId: string,
     *   eventId: string,
     *   externalConversationId: string,
     *   contact: CustomChannelContact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->quickReplyOptionId = $values['quickReplyOptionId'];
        $this->eventId = $values['eventId'];
        $this->externalConversationId = $values['externalConversationId'];
        $this->contact = $values['contact'];
    }

    /**
     * @return string
     */
    public function getQuickReplyOptionId(): string
    {
        return $this->quickReplyOptionId;
    }

    /**
     * @param string $value
     */
    public function setQuickReplyOptionId(string $value): self
    {
        $this->quickReplyOptionId = $value;
        return $this;
    }
}
