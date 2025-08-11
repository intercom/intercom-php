<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A list used to access other resources from a parent model.
 */
class AddressableList extends JsonSerializableType
{
    /**
     * @var string $type The addressable object type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id of the addressable object
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $url Url to get more company resources for this contact
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @param array{
     *   type: string,
     *   id: string,
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
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
