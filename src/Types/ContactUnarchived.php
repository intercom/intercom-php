<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ContactReference;
use Intercom\Core\Json\JsonProperty;

/**
 * unarchived contact object
 */
class ContactUnarchived extends JsonSerializableType
{
    use ContactReference;

    /**
     * @var ?bool $archived Whether the contact is archived or not.
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @param array{
     *   type?: ?'contact',
     *   id?: ?string,
     *   externalId?: ?string,
     *   archived?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->archived = $values['archived'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    /**
     * @param ?bool $value
     */
    public function setArchived(?bool $value = null): self
    {
        $this->archived = $value;
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
