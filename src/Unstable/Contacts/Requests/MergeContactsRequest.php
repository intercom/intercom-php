<?php

namespace Intercom\Unstable\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class MergeContactsRequest extends JsonSerializableType
{
    /**
     * @var ?string $from The unique identifier for the contact to merge away from. Must be a lead.
     */
    #[JsonProperty('from')]
    private ?string $from;

    /**
     * @var ?string $into The unique identifier for the contact to merge into. Must be a user.
     */
    #[JsonProperty('into')]
    private ?string $into;

    /**
     * @param array{
     *   from?: ?string,
     *   into?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->into = $values['into'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @param ?string $value
     */
    public function setFrom(?string $value = null): self
    {
        $this->from = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInto(): ?string
    {
        return $this->into;
    }

    /**
     * @param ?string $value
     */
    public function setInto(?string $value = null): self
    {
        $this->into = $value;
        return $this;
    }
}
