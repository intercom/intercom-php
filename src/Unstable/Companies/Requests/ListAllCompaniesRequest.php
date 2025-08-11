<?php

namespace Intercom\Unstable\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListAllCompaniesRequest extends JsonSerializableType
{
    /**
     * @var ?int $page The page of results to fetch. Defaults to first page
     */
    private ?int $page;

    /**
     * @var ?int $perPage How many results to return per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @var ?string $order `asc` or `desc`. Return the companies in ascending or descending order. Defaults to desc
     */
    private ?string $order;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   order?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->order = $values['order'] ?? null;
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
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @param ?string $value
     */
    public function setOrder(?string $value = null): self
    {
        $this->order = $value;
        return $this;
    }
}
