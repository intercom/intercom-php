<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Traits\ContactReference;
use Intercom\Core\Json\JsonProperty;

/**
 * blocked contact object
 */
class ContactBlocked extends JsonSerializableType
{
    use ContactReference;

    /**
     * @var ?bool $blocked Always true.
     */
    #[JsonProperty('blocked')]
    private ?bool $blocked;

    /**
     * @param array{
     *   type?: ?'contact',
     *   id?: ?string,
     *   externalId?: ?string,
     *   blocked?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->blocked = $values['blocked'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getBlocked(): ?bool
    {
        return $this->blocked;
    }

    /**
     * @param ?bool $value
     */
    public function setBlocked(?bool $value = null): self
    {
        $this->blocked = $value;
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
