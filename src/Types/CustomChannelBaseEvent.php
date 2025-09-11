<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomChannelBaseEvent extends JsonSerializableType
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
     * @param array{
     *   eventId: string,
     *   externalConversationId: string,
     *   contact: CustomChannelContact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventId = $values['eventId'];
        $this->externalConversationId = $values['externalConversationId'];
        $this->contact = $values['contact'];
    }

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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
