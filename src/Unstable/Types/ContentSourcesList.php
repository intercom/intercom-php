<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\AiContentSource\Types\ContentSource;
use Intercom\Core\Types\ArrayType;

class ContentSourcesList extends JsonSerializableType
{
    /**
     * @var ?'content_source.list' $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $totalCount The total number of content sources used by AI Agent in the conversation.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?array<ContentSource> $contentSources The content sources used by AI Agent in the conversation.
     */
    #[JsonProperty('content_sources'), ArrayType([ContentSource::class])]
    private ?array $contentSources;

    /**
     * @param array{
     *   type?: ?'content_source.list',
     *   totalCount?: ?int,
     *   contentSources?: ?array<ContentSource>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->contentSources = $values['contentSources'] ?? null;
    }

    /**
     * @return ?'content_source.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'content_source.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?array<ContentSource>
     */
    public function getContentSources(): ?array
    {
        return $this->contentSources;
    }

    /**
     * @param ?array<ContentSource> $value
     */
    public function setContentSources(?array $value = null): self
    {
        $this->contentSources = $value;
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
