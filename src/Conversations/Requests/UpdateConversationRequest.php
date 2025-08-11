<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The id of the conversation to target
     */
    private string $conversationId;

    /**
     * @var ?string $displayAs Set to plaintext to retrieve conversation messages in plain text.
     */
    private ?string $displayAs;

    /**
     * @var ?bool $read Mark a conversation as read within Intercom.
     */
    #[JsonProperty('read')]
    private ?bool $read;

    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   conversationId: string,
     *   displayAs?: ?string,
     *   read?: ?bool,
     *   customAttributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->displayAs = $values['displayAs'] ?? null;
        $this->read = $values['read'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
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
     * @return ?string
     */
    public function getDisplayAs(): ?string
    {
        return $this->displayAs;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayAs(?string $value = null): self
    {
        $this->displayAs = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }

    /**
     * @param ?bool $value
     */
    public function setRead(?bool $value = null): self
    {
        $this->read = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }
}
