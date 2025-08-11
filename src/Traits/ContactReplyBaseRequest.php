<?php

namespace Intercom\Traits;

use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * @property 'comment' $messageType
 * @property 'user' $type
 * @property string $body
 * @property ?int $createdAt
 * @property ?array<string> $attachmentUrls
 */
trait ContactReplyBaseRequest
{
    /**
     * @var 'comment' $messageType
     */
    #[JsonProperty('message_type')]
    private string $messageType;

    /**
     * @var 'user' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $body The text body of the comment.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?int $createdAt The time the reply was created. If not provided, the current time will be used.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?array<string> $attachmentUrls A list of image URLs that will be added as attachments. You can include up to 10 URLs.
     */
    #[JsonProperty('attachment_urls'), ArrayType(['string'])]
    private ?array $attachmentUrls;

    /**
     * @return 'comment'
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @param 'comment' $value
     */
    public function setMessageType(string $value): self
    {
        $this->messageType = $value;
        return $this;
    }

    /**
     * @return 'user'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'user' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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
}
