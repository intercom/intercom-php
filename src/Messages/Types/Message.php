<?php

namespace Intercom\Messages\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Message are how you reach out to contacts in Intercom. They are created when an admin sends an outbound message to a contact.
 */
class Message extends JsonSerializableType
{
    /**
     * @var string $type The type of the message
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the message.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var int $createdAt The time the conversation was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var string $subject The subject of the message. Only present if message_type: email.
     */
    #[JsonProperty('subject')]
    private string $subject;

    /**
     * @var string $body The message body, which may contain HTML.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var value-of<MessageMessageType> $messageType The type of message that was sent. Can be email, inapp, facebook or twitter.
     */
    #[JsonProperty('message_type')]
    private string $messageType;

    /**
     * @var string $conversationId The associated conversation_id
     */
    #[JsonProperty('conversation_id')]
    private string $conversationId;

    /**
     * @param array{
     *   type: string,
     *   id: string,
     *   createdAt: int,
     *   subject: string,
     *   body: string,
     *   messageType: value-of<MessageMessageType>,
     *   conversationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->subject = $values['subject'];
        $this->body = $values['body'];
        $this->messageType = $values['messageType'];
        $this->conversationId = $values['conversationId'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $value
     */
    public function setSubject(string $value): self
    {
        $this->subject = $value;
        return $this;
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

    /**
     * @return value-of<MessageMessageType>
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @param value-of<MessageMessageType> $value
     */
    public function setMessageType(string $value): self
    {
        $this->messageType = $value;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
