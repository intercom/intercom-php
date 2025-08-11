<?php

namespace Intercom\Notes\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Represents the contact that the note was created about.
 */
class NoteContact extends JsonSerializableType
{
    /**
     * @var ?'contact' $type String representing the object's type. Always has the value `contact`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the contact.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @param array{
     *   type?: ?'contact',
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return ?'contact'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'contact' $value
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
