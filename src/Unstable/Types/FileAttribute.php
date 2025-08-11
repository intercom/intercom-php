<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The value describing a file upload set for a custom attribute
 */
class FileAttribute extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $name The name of the file
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $url The url of the file. This is a temporary URL and will expire after 30 minutes.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?string $contentType The type of file
     */
    #[JsonProperty('content_type')]
    private ?string $contentType;

    /**
     * @var ?int $filesize The size of the file in bytes
     */
    #[JsonProperty('filesize')]
    private ?int $filesize;

    /**
     * @var ?int $width The width of the file in pixels, if applicable
     */
    #[JsonProperty('width')]
    private ?int $width;

    /**
     * @var ?int $height The height of the file in pixels, if applicable
     */
    #[JsonProperty('height')]
    private ?int $height;

    /**
     * @param array{
     *   type?: ?string,
     *   name?: ?string,
     *   url?: ?string,
     *   contentType?: ?string,
     *   filesize?: ?int,
     *   width?: ?int,
     *   height?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->filesize = $values['filesize'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
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
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param ?string $value
     */
    public function setContentType(?string $value = null): self
    {
        $this->contentType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFilesize(): ?int
    {
        return $this->filesize;
    }

    /**
     * @param ?int $value
     */
    public function setFilesize(?int $value = null): self
    {
        $this->filesize = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param ?int $value
     */
    public function setWidth(?int $value = null): self
    {
        $this->width = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param ?int $value
     */
    public function setHeight(?int $value = null): self
    {
        $this->height = $value;
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
