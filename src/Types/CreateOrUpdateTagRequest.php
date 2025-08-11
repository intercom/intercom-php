<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * You can create or update an existing tag.
 */
class CreateOrUpdateTagRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the tag, which will be created if not found, or the new name for the tag if this is an update request. Names are case insensitive.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $id The id of tag to updates.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @param array{
     *   name: string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->id = $values['id'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
