<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CustomChannelNotificationResponse extends JsonSerializableType
{
    /**
     * @var string $externalConversationId The external conversation ID provided in the notification request
     */
    #[JsonProperty('external_conversation_id')]
    private string $externalConversationId;

    /**
     * @var string $conversationId The Intercom conversation ID mapped to the external conversation ID
     */
    #[JsonProperty('conversation_id')]
    private string $conversationId;

    /**
     * @var string $externalContactId The external contact ID provided in the notification request
     */
    #[JsonProperty('external_contact_id')]
    private string $externalContactId;

    /**
     * @var string $contactId The Intercom contact ID mapped to the external contact ID
     */
    #[JsonProperty('contact_id')]
    private string $contactId;

    /**
     * @param array{
     *   externalConversationId: string,
     *   conversationId: string,
     *   externalContactId: string,
     *   contactId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalConversationId = $values['externalConversationId'];
        $this->conversationId = $values['conversationId'];
        $this->externalContactId = $values['externalContactId'];
        $this->contactId = $values['contactId'];
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
     * @return string
     */
    public function getConversationId(): string
    {
        return $this->conversationId;
    }

    /**
     * @param string $value
     */
    public function setConversationId(string $value): self
    {
        $this->conversationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalContactId(): string
    {
        return $this->externalContactId;
    }

    /**
     * @param string $value
     */
    public function setExternalContactId(string $value): self
    {
        $this->externalContactId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactId(): string
    {
        return $this->contactId;
    }

    /**
     * @param string $value
     */
    public function setContactId(string $value): self
    {
        $this->contactId = $value;
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
