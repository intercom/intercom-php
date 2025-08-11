<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A translation object contains the localised details of a subscription type.
 */
class Translation extends JsonSerializableType
{
    /**
     * @var string $name The localised name of the subscription type.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $description The localised description of the subscription type.
     */
    #[JsonProperty('description')]
    private string $description;

    /**
     * @var string $locale The two character identifier for the language of the translation object.
     */
    #[JsonProperty('locale')]
    private string $locale;

    /**
     * @param array{
     *   name: string,
     *   description: string,
     *   locale: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->locale = $values['locale'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $value
     */
    public function setDescription(string $value): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $value
     */
    public function setLocale(string $value): self
    {
        $this->locale = $value;
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
