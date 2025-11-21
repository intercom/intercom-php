<?php

namespace Intercom\Traits;

use Intercom\Types\CustomChannelContact;
use Intercom\Core\Json\JsonProperty;

/**
 * @property string $eventId
 * @property string $externalConversationId
 * @property CustomChannelContact $contact
 */
trait CustomChannelBaseEvent
{
    /**
     * @var string $eventId Unique identifier for the event.
     */
    #[JsonProperty('event_id')]
    private string $eventId;

    /**
     * @var string $externalConversationId Identifier for the conversation in your application.
     */
    #[JsonProperty('external_conversation_id')]
    private string $externalConversationId;

    /**
     * @var CustomChannelContact $contact
     */
    #[JsonProperty('contact')]
    private CustomChannelContact $contact;

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @param string $value
     */
    public function setEventId(string $value): self
    {
        $this->eventId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalConversationId(): string
    {
        return $this->externalConversationId;
    }

    /**
     * @param string $value
     */
    public function setExternalConversationId(string $value): self
    {
        $this->externalConversationId = $value;
        return $this;
    }

    /**
     * @return CustomChannelContact
     */
    public function getContact(): CustomChannelContact
    {
        return $this->contact;
    }

    /**
     * @param CustomChannelContact $value
     */
    public function setContact(CustomChannelContact $value): self
    {
        $this->contact = $value;
        return $this;
    }
}
