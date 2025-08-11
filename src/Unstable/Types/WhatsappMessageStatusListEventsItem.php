<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class WhatsappMessageStatusListEventsItem extends JsonSerializableType
{
    /**
     * @var string $id Event ID
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $conversationId ID of the conversation
     */
    #[JsonProperty('conversation_id')]
    private string $conversationId;

    /**
     * @var value-of<WhatsappMessageStatusListEventsItemStatus> $status Current status of the message
     */
    #[JsonProperty('status')]
    private string $status;

    /**
     * @var 'broadcast_outbound' $type Event type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $createdAt Creation timestamp
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var int $updatedAt Last update timestamp
     */
    #[JsonProperty('updated_at')]
    private int $updatedAt;

    /**
     * @var string $whatsappMessageId WhatsApp's message identifier
     */
    #[JsonProperty('whatsapp_message_id')]
    private string $whatsappMessageId;

    /**
     * @var ?string $templateName Name of the WhatsApp template used
     */
    #[JsonProperty('template_name')]
    private ?string $templateName;

    /**
     * @param array{
     *   id: string,
     *   conversationId: string,
     *   status: value-of<WhatsappMessageStatusListEventsItemStatus>,
     *   type: 'broadcast_outbound',
     *   createdAt: int,
     *   updatedAt: int,
     *   whatsappMessageId: string,
     *   templateName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->conversationId = $values['conversationId'];
        $this->status = $values['status'];
        $this->type = $values['type'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->whatsappMessageId = $values['whatsappMessageId'];
        $this->templateName = $values['templateName'] ?? null;
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
     * @return value-of<WhatsappMessageStatusListEventsItemStatus>
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param value-of<WhatsappMessageStatusListEventsItemStatus> $value
     */
    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return 'broadcast_outbound'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'broadcast_outbound' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $value
     */
    public function setUpdatedAt(int $value): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWhatsappMessageId(): string
    {
        return $this->whatsappMessageId;
    }

    /**
     * @param string $value
     */
    public function setWhatsappMessageId(string $value): self
    {
        $this->whatsappMessageId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    /**
     * @param ?string $value
     */
    public function setTemplateName(?string $value = null): self
    {
        $this->templateName = $value;
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
