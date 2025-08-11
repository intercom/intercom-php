<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The majority of list resources in the API are paginated to allow clients to traverse data over multiple requests.
 *
 * Their responses are likely to contain a pages object that hosts pagination links which a client can use to paginate through the data without having to construct a query. The link relations for the pages field are as follows.
 */
class PagesLink extends JsonSerializableType
{
    /**
     * @var ?'pages' $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    private ?int $page;

    /**
     * @var ?string $next A link to the next page of results. A response that does not contain a next link does not have further data to fetch.
     */
    #[JsonProperty('next')]
    private ?string $next;

    /**
     * @var ?int $perPage
     */
    #[JsonProperty('per_page')]
    private ?int $perPage;

    /**
     * @var ?int $totalPages
     */
    #[JsonProperty('total_pages')]
    private ?int $totalPages;

    /**
     * @param array{
     *   type?: ?'pages',
     *   page?: ?int,
     *   next?: ?string,
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
