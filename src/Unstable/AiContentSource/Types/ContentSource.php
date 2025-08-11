<?php

namespace Intercom\Unstable\AiContentSource\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The content source used by AI Agent in the conversation.
 */
class ContentSource extends JsonSerializableType
{
    /**
     * @var ?value-of<ContentSourceContentType> $contentType The type of the content source.
     */
    #[JsonProperty('content_type')]
    private ?string $contentType;

    /**
     * @var ?string $url The internal URL linking to the content source for teammates.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?string $title The title of the content source.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $locale The ISO 639 language code of the content source.
     */
    #[JsonProperty('locale')]
    private ?string $locale;

    /**
     * @param array{
     *   contentType?: ?value-of<ContentSourceContentType>,
     *   url?: ?string,
     *   title?: ?string,
     *   locale?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentType = $values['contentType'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->locale = $values['locale'] ?? null;
    }

    /**
     * @return ?value-of<ContentSourceContentType>
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param ?value-of<ContentSourceContentType> $value
     */
    public function setContentType(?string $value = null): self
    {
        $this->contentType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param ?string $value
     */
    public function setLocale(?string $value = null): self
    {
        $this->locale = $value;
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
