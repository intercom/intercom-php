<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\QuickReplyOption;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class ConversationPartMetadataQuickReplyOptionsItem extends JsonSerializableType
{
    use QuickReplyOption;

    /**
     * @var ?array<string, mixed> $translations The translations for the quick reply option.
     */
    #[JsonProperty('translations'), ArrayType(['string' => 'mixed'])]
    private ?array $translations;

    /**
     * @param array{
     *   text: string,
     *   uuid: string,
     *   translations?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->uuid = $values['uuid'];
        $this->translations = $values['translations'] ?? null;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setTranslations(?array $value = null): self
    {
        $this->translations = $value;
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
