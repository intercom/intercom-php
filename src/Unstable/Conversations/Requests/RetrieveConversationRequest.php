<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class RetrieveConversationRequest extends JsonSerializableType
{
    /**
     * @var int $id The id of the conversation to target
     */
    private int $id;

    /**
     * @var ?string $displayAs Set to plaintext to retrieve conversation messages in plain text. This affects both the body and subject fields.
     */
    private ?string $displayAs;

    /**
     * @var ?bool $includeTranslations If set to true, conversation parts will be translated to the detected language of the conversation.
     */
    private ?bool $includeTranslations;

    /**
     * @param array{
     *   id: int,
     *   displayAs?: ?string,
     *   includeTranslations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->displayAs = $values['displayAs'] ?? null;
        $this->includeTranslations = $values['includeTranslations'] ?? null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
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
