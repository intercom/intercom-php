<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A reference to a company associated with a contact
 */
class ContactCompany extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the company
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var 'company' $type The type of the object
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $url URL to get the full company resource
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @param array{
     *   id: string,
     *   type: 'company',
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return 'company'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'company' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value): self
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
