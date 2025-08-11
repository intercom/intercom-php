<?php

namespace Intercom\Unstable\Macros\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Pagination information
 */
class MacroListPages extends JsonSerializableType
{
    /**
     * @var ?'pages' $type The type of pagination
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $perPage Number of results per page
     */
    #[JsonProperty('per_page')]
    private ?int $perPage;

    /**
     * @var ?MacroListPagesNext $next Cursor for the next page
     */
    #[JsonProperty('next')]
    private ?MacroListPagesNext $next;

    /**
     * @param array{
     *   type?: ?'pages',
     *   perPage?: ?int,
     *   next?: ?MacroListPagesNext,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->next = $values['next'] ?? null;
    }

    /**
     * @return ?'pages'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'pages' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param ?int $value
     */
    public function setPerPage(?int $value = null): self
    {
        $this->perPage = $value;
        return $this;
    }

    /**
     * @return ?MacroListPagesNext
     */
    public function getNext(): ?MacroListPagesNext
    {
        return $this->next;
    }

    /**
     * @param ?MacroListPagesNext $value
     */
    public function setNext(?MacroListPagesNext $value = null): self
    {
        $this->next = $value;
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
