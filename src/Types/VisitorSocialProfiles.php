<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class VisitorSocialProfiles extends JsonSerializableType
{
    /**
     * @var ?'social_profile.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<string> $socialProfiles
     */
    #[JsonProperty('social_profiles'), ArrayType(['string'])]
    private ?array $socialProfiles;

    /**
     * @param array{
     *   type?: ?'social_profile.list',
     *   socialProfiles?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->socialProfiles = $values['socialProfiles'] ?? null;
    }

    /**
     * @return ?'social_profile.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'social_profile.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSocialProfiles(): ?array
    {
        return $this->socialProfiles;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSocialProfiles(?array $value = null): self
    {
        $this->socialProfiles = $value;
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
