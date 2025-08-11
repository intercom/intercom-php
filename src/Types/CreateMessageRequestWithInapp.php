<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateMessageRequestWithInapp extends JsonSerializableType
{
    /**
     * @var ?string $subject The title of the email.
     */
    #[JsonProperty('subject')]
    private ?string $subject;

    /**
     * @var string $body The content of the message. HTML and plaintext are supported.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?string $template The style of the outgoing message. Possible values `plain` or `personal`.
     */
    #[JsonProperty('template')]
    private ?string $template;

    /**
     * @var CreateMessageRequestFrom $from The sender of the message. If not provided, the default sender will be used.
     */
    #[JsonProperty('from')]
    private CreateMessageRequestFrom $from;

    /**
     * @var CreateMessageRequestTo $to The sender of the message. If not provided, the default sender will be used.
     */
    #[JsonProperty('to')]
    private CreateMessageRequestTo $to;

    /**
     * @var ?int $createdAt The time the message was created. If not provided, the current time will be used.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?bool $createConversationWithoutContactReply Whether a conversation should be opened in the inbox for the message without the contact replying. Defaults to false if not provided.
     */
    #[JsonProperty('create_conversation_without_contact_reply')]
    private ?bool $createConversationWithoutContactReply;

    /**
     * @param array{
     *   body: string,
     *   from: CreateMessageRequestFrom,
     *   to: CreateMessageRequestTo,
     *   subject?: ?string,
     *   template?: ?string,
     *   createdAt?: ?int,
     *   createConversationWithoutContactReply?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subject = $values['subject'] ?? null;
        $this->body = $values['body'];
        $this->template = $values['template'] ?? null;
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createConversationWithoutContactReply = $values['createConversationWithoutContactReply'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param ?string $value
     */
    public function setSubject(?string $value = null): self
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
     * @return ?string
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param ?string $value
     */
    public function setTemplate(?string $value = null): self
    {
        $this->template = $value;
        return $this;
    }

    /**
     * @return CreateMessageRequestFrom
     */
    public function getFrom(): CreateMessageRequestFrom
    {
        return $this->from;
    }

    /**
     * @param CreateMessageRequestFrom $value
     */
    public function setFrom(CreateMessageRequestFrom $value): self
    {
        $this->from = $value;
        return $this;
    }

    /**
     * @return CreateMessageRequestTo
     */
    public function getTo(): CreateMessageRequestTo
    {
        return $this->to;
    }

    /**
     * @param CreateMessageRequestTo $value
     */
    public function setTo(CreateMessageRequestTo $value): self
    {
        $this->to = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCreateConversationWithoutContactReply(): ?bool
    {
        return $this->createConversationWithoutContactReply;
    }

    /**
     * @param ?bool $value
     */
    public function setCreateConversationWithoutContactReply(?bool $value = null): self
    {
        $this->createConversationWithoutContactReply = $value;
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
