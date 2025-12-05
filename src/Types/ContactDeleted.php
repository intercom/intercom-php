<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReference;
use Intercom\Core\Json\JsonProperty;

/**
 * deleted contact object
 */
class ContactDeleted extends JsonSerializableType
{
    use ContactReference;

    /**
     * @var ?bool $deleted Whether the contact is deleted or not.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @param array{
     *   type?: ?'contact',
     *   id?: ?string,
     *   externalId?: ?string,
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
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
