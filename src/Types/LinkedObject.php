<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A linked conversation or ticket.
 */
class LinkedObject extends JsonSerializableType
{
    /**
     * @var ?value-of<LinkedObjectType> $type ticket or conversation
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the linked object
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?value-of<LinkedObjectCategory> $category Category of the Linked Ticket Object.
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @param array{
     *   type?: ?value-of<LinkedObjectType>,
     *   id?: ?string,
     *   category?: ?value-of<LinkedObjectCategory>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->category = $values['category'] ?? null;
    }

    /**
     * @return ?value-of<LinkedObjectType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<LinkedObjectType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
     * @return ?value-of<LinkedObjectCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<LinkedObjectCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
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
