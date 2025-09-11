<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An object containing information on the first users message. For a contact initiated message this will represent the users original message.
 */
class ConversationFirstContactReply extends JsonSerializableType
{
    /**
     * @var ?int $createdAt
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @param array{
     *   createdAt?: ?int,
     *   type?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
