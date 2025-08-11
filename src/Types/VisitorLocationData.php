<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class VisitorLocationData extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $cityName The city name of the visitor.
     */
    #[JsonProperty('city_name')]
    private ?string $cityName;

    /**
     * @var ?string $continentCode The continent code of the visitor.
     */
    #[JsonProperty('continent_code')]
    private ?string $continentCode;

    /**
     * @var ?string $countryCode The country code of the visitor.
     */
    #[JsonProperty('country_code')]
    private ?string $countryCode;

    /**
     * @var ?string $countryName The country name of the visitor.
     */
    #[JsonProperty('country_name')]
    private ?string $countryName;

    /**
     * @var ?string $postalCode The postal code of the visitor.
     */
    #[JsonProperty('postal_code')]
    private ?string $postalCode;

    /**
     * @var ?string $regionName The region name of the visitor.
     */
    #[JsonProperty('region_name')]
    private ?string $regionName;

    /**
     * @var ?string $timezone The timezone of the visitor.
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * @param array{
     *   type?: ?string,
     *   cityName?: ?string,
     *   continentCode?: ?string,
     *   countryCode?: ?string,
     *   countryName?: ?string,
     *   postalCode?: ?string,
     *   regionName?: ?string,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->cityName = $values['cityName'] ?? null;
        $this->continentCode = $values['continentCode'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->countryName = $values['countryName'] ?? null;
        $this->postalCode = $values['postalCode'] ?? null;
        $this->regionName = $values['regionName'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
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
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @param ?string $value
     */
    public function setCityName(?string $value = null): self
    {
        $this->cityName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getContinentCode(): ?string
    {
        return $this->continentCode;
    }

    /**
     * @param ?string $value
     */
    public function setContinentCode(?string $value = null): self
    {
        $this->continentCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param ?string $value
     */
    public function setCountryCode(?string $value = null): self
    {
        $this->countryCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    /**
     * @param ?string $value
     */
    public function setCountryName(?string $value = null): self
    {
        $this->countryName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param ?string $value
     */
    public function setPostalCode(?string $value = null): self
    {
        $this->postalCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRegionName(): ?string
    {
        return $this->regionName;
    }

    /**
     * @param ?string $value
     */
    public function setRegionName(?string $value = null): self
    {
        $this->regionName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
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
