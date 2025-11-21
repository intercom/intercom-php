<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindConversationRequest extends JsonSerializableType
{
    /**
     * @var int $conversationId The id of the conversation to target
     */
    private int $conversationId;

    /**
     * @var ?string $displayAs Set to plaintext to retrieve conversation messages in plain text.
     */
    private ?string $displayAs;

    /**
     * @var ?bool $includeTranslations If set to true, conversation parts will be translated to the detected language of the conversation.
     */
    private ?bool $includeTranslations;

    /**
     * @param array{
     *   conversationId: int,
     *   displayAs?: ?string,
     *   includeTranslations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->displayAs = $values['displayAs'] ?? null;
        $this->includeTranslations = $values['includeTranslations'] ?? null;
    }

    /**
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    /**
     * @param int $value
     */
    public function setConversationId(int $value): self
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
    public function getIncludeTranslations(): ?bool
    {
        return $this->includeTranslations;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeTranslations(?bool $value = null): self
    {
        $this->includeTranslations = $value;
        return $this;
    }
}
