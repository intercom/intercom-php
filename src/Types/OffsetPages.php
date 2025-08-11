<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class OffsetPages extends JsonSerializableType
{
    /**
     * @var 'offset_pages' $type the type of object `offset_pages`
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?int $page The current offset
     */
    #[JsonProperty('page')]
    private ?int $page;

    /**
     * @var ?string $next
     */
    #[JsonProperty('next')]
    private ?string $next;

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
     *   type: 'offset_pages',
     *   page?: ?int,
     *   next?: ?string,
     *   perPage?: ?int,
     *   totalPages?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->page = $values['page'] ?? null;
        $this->next = $values['next'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
    }

    /**
     * @return 'offset_pages'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'offset_pages' $value
     */
    public function setType(string $value): self
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
