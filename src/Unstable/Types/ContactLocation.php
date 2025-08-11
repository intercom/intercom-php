<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An object containing location meta data about a Intercom contact.
 */
class ContactLocation extends JsonSerializableType
{
    /**
     * @var ?string $type Always location
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $country The country that the contact is located in
     */
    #[JsonProperty('country')]
    private ?string $country;

    /**
     * @var ?string $region The overal region that the contact is located in
     */
    #[JsonProperty('region')]
    private ?string $region;

    /**
     * @var ?string $city The city that the contact is located in
     */
    #[JsonProperty('city')]
    private ?string $city;

    /**
     * @param array{
     *   type?: ?string,
     *   country?: ?string,
     *   region?: ?string,
     *   city?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->city = $values['city'] ?? null;
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
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param ?string $value
     */
    public function setCountry(?string $value = null): self
    {
        $this->country = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param ?string $value
     */
    public function setRegion(?string $value = null): self
    {
        $this->region = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param ?string $value
     */
    public function setCity(?string $value = null): self
    {
        $this->city = $value;
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
