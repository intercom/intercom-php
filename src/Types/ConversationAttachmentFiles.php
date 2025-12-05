<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Properties of the attachment files in a conversation part
 */
class ConversationAttachmentFiles extends JsonSerializableType
{
    /**
     * @var ?string $contentType The content type of the file
     */
    #[JsonProperty('content_type')]
    private ?string $contentType;

    /**
     * @var ?string $data The base64 encoded file data.
     */
    #[JsonProperty('data')]
    private ?string $data;

    /**
     * @var ?string $name The name of the file.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @param array{
     *   contentType?: ?string,
     *   data?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentType = $values['contentType'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->name = $values['name'] ?? null;
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
     * @return ?string
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param ?string $value
     */
    public function setData(?string $value = null): self
    {
        $this->data = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
