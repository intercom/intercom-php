<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Pagination
 */
class DataEventListPages extends JsonSerializableType
{
    /**
     * @var ?string $next
     */
    #[JsonProperty('next')]
    private ?string $next;

    /**
     * @var ?string $since
     */
    #[JsonProperty('since')]
    private ?string $since;

    /**
     * @param array{
     *   next?: ?string,
     *   since?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->next = $values['next'] ?? null;
        $this->since = $values['since'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getNext(): ?string
    {
        return $this->next;
    }

    /**
     * @param ?string $value
     */
    public function setNext(?string $value = null): self
    {
        $this->next = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSince(): ?string
    {
        return $this->since;
    }

    /**
     * @param ?string $value
     */
    public function setSince(?string $value = null): self
    {
        $this->since = $value;
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
