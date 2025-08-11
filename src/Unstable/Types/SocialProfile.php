<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A Social Profile allows you to label your contacts, companies, and conversations and list them using that Social Profile.
 */
class SocialProfile extends JsonSerializableType
{
    /**
     * @var ?string $type value is "social_profile"
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $name The name of the Social media profile
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $url The name of the Social media profile
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @param array{
     *   type?: ?string,
     *   name?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->url = $values['url'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
