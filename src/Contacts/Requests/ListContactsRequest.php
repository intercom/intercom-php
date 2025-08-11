<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListContactsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page The page of results to fetch. Defaults to first page
     */
    private ?int $page;

    /**
     * @var ?int $perPage How many results to display per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @var ?string $startingAfter String used to get the next page of conversations.
     */
    private ?string $startingAfter;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
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
     * @return ?string
     */
    public function getStartingAfter(): ?string
    {
        return $this->startingAfter;
    }

    /**
     * @param ?string $value
     */
    public function setStartingAfter(?string $value = null): self
    {
        $this->startingAfter = $value;
        return $this;
    }
}
