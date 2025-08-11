<?php

namespace Intercom\Unstable\Contacts\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ContactAvatar extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $imageUrl An image URL containing the avatar of a contact.
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
