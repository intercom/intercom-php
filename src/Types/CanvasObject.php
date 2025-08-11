<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * You have to respond to the majority of requests with a canvas object. This will tell us what UI to show for your app.
 *
 * A canvas can either be static (meaning we send you the next request only when an action takes place) or live (meaning we send you the next request when someone views the app).
 *
 * - A static canvas needs a ContentObject which will contain the components to show.
 * - A live canvas needs a `content_url` which we we will make the Live Canvas requests to when the app is viewed. This is only possible for apps viewed or used in the Messenger.
 */
class CanvasObject extends JsonSerializableType
{
    /**
     * @var ContentObject $content The content object that will be shown as the UI of the app. Max Size is 64KB.
     */
    #[JsonProperty('content')]
    private ContentObject $content;

    /**
     * @var ?string $contentUrl The URL which we make Live Canvas requests to. You must respond to these with a content object. Max size is 64KB.
     */
    #[JsonProperty('content_url')]
    private ?string $contentUrl;

    /**
     * @var ?array<string, mixed> $storedData Optional Stored Data that you want to be returned in the next sent request. Max Size is 64KB.
     */
    #[JsonProperty('stored_data'), ArrayType(['string' => 'mixed'])]
    private ?array $storedData;

    /**
     * @param array{
     *   content: ContentObject,
     *   contentUrl?: ?string,
     *   storedData?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'];
        $this->contentUrl = $values['contentUrl'] ?? null;
        $this->storedData = $values['storedData'] ?? null;
    }

    /**
     * @return ContentObject
     */
    public function getContent(): ContentObject
    {
        return $this->content;
    }

    /**
     * @param ContentObject $value
     */
    public function setContent(ContentObject $value): self
    {
        $this->content = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContentUrl(): ?string
    {
        return $this->contentUrl;
    }

    /**
     * @param ?string $value
     */
    public function setContentUrl(?string $value = null): self
    {
        $this->contentUrl = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getStoredData(): ?array
    {
        return $this->storedData;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setStoredData(?array $value = null): self
    {
        $this->storedData = $value;
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
