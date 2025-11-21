<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Cursor-based pagination is a technique used in the Intercom API to navigate through large amounts of data.
 * A "cursor" or pointer is used to keep track of the current position in the result set, allowing the API to return the data in small chunks or "pages" as needed.
 */
class CursorPages extends JsonSerializableType
{
    /**
     * @var ?'pages' $type the type of object `pages`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $page The current page
     */
    #[JsonProperty('page')]
    private ?int $page;

    /**
     * @var ?StartingAfterPaging $next
     */
    #[JsonProperty('next')]
    private ?StartingAfterPaging $next;

    /**
     * @var ?int $perPage Number of results per page
     */
    #[JsonProperty('per_page')]
    private ?int $perPage;

    /**
     * @var ?int $totalPages Total number of pages
     */
    #[JsonProperty('total_pages')]
    private ?int $totalPages;

    /**
     * @param array{
     *   type?: ?'pages',
     *   page?: ?int,
     *   next?: ?StartingAfterPaging,
     *   perPage?: ?int,
     *   totalPages?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->next = $values['next'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
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
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param ?int $value
     */
    public function setPage(?int $value = null): self
    {
        $this->page = $value;
        return $this;
    }

    /**
     * @return ?StartingAfterPaging
     */
    public function getNext(): ?StartingAfterPaging
    {
        return $this->next;
    }

    /**
     * @param ?StartingAfterPaging $value
     */
    public function setNext(?StartingAfterPaging $value = null): self
    {
        $this->next = $value;
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
     * @return ?int
     */
    public function getTotalPages(): ?int
    {
        return $this->totalPages;
    }

    /**
     * @param ?int $value
     */
    public function setTotalPages(?int $value = null): self
    {
        $this->totalPages = $value;
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
