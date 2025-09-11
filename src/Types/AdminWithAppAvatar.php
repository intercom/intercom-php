<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * This object represents the avatar associated with the admin.
 */
class AdminWithAppAvatar extends JsonSerializableType
{
    /**
     * @var ?string $type This is a string that identifies the type of the object. It will always have the value `avatar`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $imageUrl This object represents the avatar associated with the admin.
     */
    #[JsonProperty('image_url')]
    private ?string $imageUrl;

    /**
     * @param array{
     *   type?: ?string,
     *   imageUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
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
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param ?string $value
     */
    public function setImageUrl(?string $value = null): self
    {
        $this->imageUrl = $value;
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
