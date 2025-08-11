<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Metadata for a conversation part
 */
class ConversationPartMetadata extends JsonSerializableType
{
    /**
     * @var ?array<ConversationPartMetadataQuickReplyOptionsItem> $quickReplyOptions The quick reply options sent by the Admin or bot, presented in this conversation part.
     */
    #[JsonProperty('quick_reply_options'), ArrayType([ConversationPartMetadataQuickReplyOptionsItem::class])]
    private ?array $quickReplyOptions;

    /**
     * @var ?string $quickReplyUuid The unique identifier for the quick reply option that was clicked by the end user.
     */
    #[JsonProperty('quick_reply_uuid')]
    private ?string $quickReplyUuid;

    /**
     * @param array{
     *   quickReplyOptions?: ?array<ConversationPartMetadataQuickReplyOptionsItem>,
     *   quickReplyUuid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->quickReplyOptions = $values['quickReplyOptions'] ?? null;
        $this->quickReplyUuid = $values['quickReplyUuid'] ?? null;
    }

    /**
     * @return ?array<ConversationPartMetadataQuickReplyOptionsItem>
     */
    public function getQuickReplyOptions(): ?array
    {
        return $this->quickReplyOptions;
    }

    /**
     * @param ?array<ConversationPartMetadataQuickReplyOptionsItem> $value
     */
    public function setQuickReplyOptions(?array $value = null): self
    {
        $this->quickReplyOptions = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuickReplyUuid(): ?string
    {
        return $this->quickReplyUuid;
    }

    /**
     * @param ?string $value
     */
    public function setQuickReplyUuid(?string $value = null): self
    {
        $this->quickReplyUuid = $value;
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
