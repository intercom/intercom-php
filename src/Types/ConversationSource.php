<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The Conversation Part that originated this conversation, which can be Contact, Admin, Campaign, Automated or Operator initiated.
 */
class ConversationSource extends JsonSerializableType
{
    /**
     * @var value-of<ConversationSourceType> $type This includes conversation, email, facebook, instagram, phone_call, phone_switch, push, sms, twitter and whatsapp.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id representing the message.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $deliveredAs The conversation's initiation type. Possible values are customer_initiated, campaigns_initiated (legacy campaigns), operator_initiated (Custom bot), automated (Series and other outbounds with dynamic audience message) and admin_initiated (fixed audience message, ticket initiated by an admin, group email).
     */
    #[JsonProperty('delivered_as')]
    private string $deliveredAs;

    /**
     * @var string $subject Optional. The message subject. For Twitter, this will show a generic message regarding why the subject is obscured.
     */
    #[JsonProperty('subject')]
    private string $subject;

    /**
     * @var ?string $body The message body, which may contain HTML. For Twitter, this will show a generic message regarding why the body is obscured.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ConversationPartAuthor $author
     */
    #[JsonProperty('author')]
    private ConversationPartAuthor $author;

    /**
     * @var ?array<PartAttachment> $attachments A list of attachments for the part.
     */
    #[JsonProperty('attachments'), ArrayType([PartAttachment::class])]
    private ?array $attachments;

    /**
     * @var ?string $url The URL where the conversation was started. For Twitter, Email, and Bots, this will be blank.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var bool $redacted Whether or not the source message has been redacted. Only applicable for contact initiated messages.
     */
    #[JsonProperty('redacted')]
    private bool $redacted;

    /**
     * @param array{
     *   type: value-of<ConversationSourceType>,
     *   id: string,
     *   deliveredAs: string,
     *   subject: string,
     *   author: ConversationPartAuthor,
     *   redacted: bool,
     *   body?: ?string,
     *   attachments?: ?array<PartAttachment>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->deliveredAs = $values['deliveredAs'];
        $this->subject = $values['subject'];
        $this->body = $values['body'] ?? null;
        $this->author = $values['author'];
        $this->attachments = $values['attachments'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->redacted = $values['redacted'];
    }

    /**
     * @return value-of<ConversationSourceType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<ConversationSourceType> $value
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
     * @return string
     */
    public function getDeliveredAs(): string
    {
        return $this->deliveredAs;
    }

    /**
     * @param string $value
     */
    public function setDeliveredAs(string $value): self
    {
        $this->deliveredAs = $value;
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
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return ConversationPartAuthor
     */
    public function getAuthor(): ConversationPartAuthor
    {
        return $this->author;
    }

    /**
     * @param ConversationPartAuthor $value
     */
    public function setAuthor(ConversationPartAuthor $value): self
    {
        $this->author = $value;
        return $this;
    }

    /**
     * @return ?array<PartAttachment>
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param ?array<PartAttachment> $value
     */
    public function setAttachments(?array $value = null): self
    {
        $this->attachments = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getRedacted(): bool
    {
        return $this->redacted;
    }

    /**
     * @param bool $value
     */
    public function setRedacted(bool $value): self
    {
        $this->redacted = $value;
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
