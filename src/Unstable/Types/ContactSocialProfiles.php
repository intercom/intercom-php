<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing social profiles that a contact has.
 */
class ContactSocialProfiles extends JsonSerializableType
{
    /**
     * @var ?array<SocialProfile> $data A list of social profiles objects associated with the contact.
     */
    #[JsonProperty('data'), ArrayType([SocialProfile::class])]
    private ?array $data;

    /**
     * @param array{
     *   data?: ?array<SocialProfile>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?array<SocialProfile>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<SocialProfile> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
