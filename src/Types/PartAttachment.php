<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The file attached to a part
 */
class PartAttachment extends JsonSerializableType
{
    /**
     * @var string $type The type of attachment
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $name The name of the attachment
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $url The URL of the attachment
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @var string $contentType The content type of the attachment
     */
    #[JsonProperty('content_type')]
    private string $contentType;

    /**
     * @var int $filesize The size of the attachment
     */
    #[JsonProperty('filesize')]
    private int $filesize;

    /**
     * @var int $width The width of the attachment
     */
    #[JsonProperty('width')]
    private int $width;

    /**
     * @var int $height The height of the attachment
     */
    #[JsonProperty('height')]
    private int $height;

    /**
     * @param array{
     *   type: string,
     *   name: string,
     *   url: string,
     *   contentType: string,
     *   filesize: int,
     *   width: int,
     *   height: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->name = $values['name'];
        $this->url = $values['url'];
        $this->contentType = $values['contentType'];
        $this->filesize = $values['filesize'];
        $this->width = $values['width'];
        $this->height = $values['height'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $value
     */
    public function setContentType(string $value): self
    {
        $this->contentType = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getFilesize(): int
    {
        return $this->filesize;
    }

    /**
     * @param int $value
     */
    public function setFilesize(int $value): self
    {
        $this->filesize = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $value
     */
    public function setWidth(int $value): self
    {
        $this->width = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $value
     */
    public function setHeight(int $value): self
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
