<?php

namespace Intercom\Admins\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The avatar object associated with the admin
 */
class AdminAvatar extends JsonSerializableType
{
    /**
     * @var string $imageUrl URL of the admin's avatar image
     */
    #[JsonProperty('image_url')]
    private string $imageUrl;

    /**
     * @param array{
     *   imageUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->imageUrl = $values['imageUrl'];
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $value
     */
    public function setImageUrl(string $value): self
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
