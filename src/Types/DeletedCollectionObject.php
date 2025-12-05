<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Response returned when an object is deleted
 */
class DeletedCollectionObject extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the collection which you provided in the URL.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'collection' $object The type of object which was deleted. - `collection`
     */
    #[JsonProperty('object')]
    private ?string $object;

    /**
     * @var ?bool $deleted Whether the collection was deleted successfully or not.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @param array{
     *   id?: ?string,
     *   object?: ?'collection',
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
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
     * @return ?'collection'
     */
    public function getObject(): ?string
    {
        return $this->object;
    }

    /**
     * @param ?'collection' $value
     */
    public function setObject(?string $value = null): self
    {
        $this->object = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param ?bool $value
     */
    public function setDeleted(?bool $value = null): self
    {
        $this->deleted = $value;
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
