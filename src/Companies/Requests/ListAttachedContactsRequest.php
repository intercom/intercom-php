<?php

namespace Intercom\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListAttachedContactsRequest extends JsonSerializableType
{
    /**
     * @var string $companyId The unique identifier for the company which is given by Intercom
     */
    private string $companyId;

    /**
     * @var ?int $page The page of results to fetch. Defaults to first page
     */
    private ?int $page;

    /**
     * @var ?int $perPage How many results to return per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @param array{
     *   companyId: string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $value
     */
    public function setCompanyId(string $value): self
    {
        $this->companyId = $value;
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
}
