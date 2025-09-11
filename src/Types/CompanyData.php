<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An object containing data about the companies that a contact is associated with.
 */
class CompanyData extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the company which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'company' $type The type of the object. Always company.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $url The relative URL of the company.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?'company',
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?'company'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'company' $value
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
