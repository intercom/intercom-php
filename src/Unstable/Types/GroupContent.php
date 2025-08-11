<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The Content of a Group.
 */
class GroupContent extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object - `group_content` .
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $name The name of the collection or section.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description The description of the collection. Only available for collections.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @param array{
     *   type?: ?string,
     *   name?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
