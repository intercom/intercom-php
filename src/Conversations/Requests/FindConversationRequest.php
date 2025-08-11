<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindConversationRequest extends JsonSerializableType
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
     * @param array{
     *   conversationId: string,
     *   displayAs?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->displayAs = $values['displayAs'] ?? null;
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
}
