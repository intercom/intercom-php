<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Payload of the request to reply on behalf of an admin
 */
class AdminReplyTicketRequest extends JsonSerializableType
{
    /**
     * @var value-of<AdminReplyTicketRequestMessageType> $messageType
     */
    #[JsonProperty('message_type')]
    private string $messageType;

    /**
     * @var 'admin' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?string $body The text body of the reply. Notes accept some HTML formatting. Must be present for comment and note message types.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var string $adminId The id of the admin who is authoring the comment.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @var ?int $createdAt The time the reply was created. If not provided, the current time will be used.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?array<AdminReplyTicketRequestReplyOptionsItem> $replyOptions The quick reply options to display. Must be present for quick_reply message types.
     */
    #[JsonProperty('reply_options'), ArrayType([AdminReplyTicketRequestReplyOptionsItem::class])]
    private ?array $replyOptions;

    /**
     * @var ?array<string> $attachmentUrls A list of image URLs that will be added as attachments. You can include up to 10 URLs.
     */
    #[JsonProperty('attachment_urls'), ArrayType(['string'])]
    private ?array $attachmentUrls;

    /**
     * @param array{
     *   messageType: value-of<AdminReplyTicketRequestMessageType>,
     *   type: 'admin',
     *   adminId: string,
     *   body?: ?string,
     *   createdAt?: ?int,
     *   replyOptions?: ?array<AdminReplyTicketRequestReplyOptionsItem>,
     *   attachmentUrls?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messageType = $values['messageType'];
        $this->type = $values['type'];
        $this->body = $values['body'] ?? null;
        $this->adminId = $values['adminId'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->replyOptions = $values['replyOptions'] ?? null;
        $this->attachmentUrls = $values['attachmentUrls'] ?? null;
    }

    /**
     * @return value-of<AdminReplyTicketRequestMessageType>
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @param value-of<AdminReplyTicketRequestMessageType> $value
     */
    public function setMessageType(string $value): self
    {
        $this->messageType = $value;
        return $this;
    }

    /**
     * @return 'admin'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'admin' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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
     * @return string
     */
    public function getAdminId(): string
    {
        return $this->adminId;
    }

    /**
     * @param string $value
     */
    public function setAdminId(string $value): self
    {
        $this->adminId = $value;
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
     * @return ?array<AdminReplyTicketRequestReplyOptionsItem>
     */
    public function getReplyOptions(): ?array
    {
        return $this->replyOptions;
    }

    /**
     * @param ?array<AdminReplyTicketRequestReplyOptionsItem> $value
     */
    public function setReplyOptions(?array $value = null): self
    {
        $this->replyOptions = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getAttachmentUrls(): ?array
    {
        return $this->attachmentUrls;
    }

    /**
     * @param ?array<string> $value
     */
    public function setAttachmentUrls(?array $value = null): self
    {
        $this->attachmentUrls = $value;
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
