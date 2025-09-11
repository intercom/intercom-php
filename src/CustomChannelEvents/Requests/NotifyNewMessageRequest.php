<?php

namespace Intercom\CustomChannelEvents\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\CustomChannelBaseEvent;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\CustomChannelContact;

class NotifyNewMessageRequest extends JsonSerializableType
{
    use CustomChannelBaseEvent;

    /**
     * @var string $body The message content sent by the user.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @param array{
     *   body: string,
     *   eventId: string,
     *   externalConversationId: string,
     *   contact: CustomChannelContact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
        $this->eventId = $values['eventId'];
        $this->externalConversationId = $values['externalConversationId'];
        $this->contact = $values['contact'];
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
        return $this;
    }
}
