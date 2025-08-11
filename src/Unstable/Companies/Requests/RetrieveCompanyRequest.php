<?php

namespace Intercom\Unstable\Companies\Requests;

use Intercom\Core\Json\JsonSerializableType;

class RetrieveCompanyRequest extends JsonSerializableType
{
    /**
     * @var ?string $name The `name` of the company to filter by.
     */
    private ?string $name;

    /**
     * @var ?string $companyId The `company_id` of the company to filter by.
     */
    private ?string $companyId;

    /**
     * @var ?string $tagId The `tag_id` of the company to filter by.
     */
    private ?string $tagId;

    /**
     * @var ?string $segmentId The `segment_id` of the company to filter by.
     */
    private ?string $segmentId;

    /**
     * @var ?int $page The page of results to fetch. Defaults to first page
     */
    private ?int $page;

    /**
     * @var ?int $perPage How many results to display per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @param array{
     *   name?: ?string,
     *   companyId?: ?string,
     *   tagId?: ?string,
     *   segmentId?: ?string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->tagId = $values['tagId'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTagId(): ?string
    {
        return $this->tagId;
    }

    /**
     * @param ?string $value
     */
    public function setTagId(?string $value = null): self
    {
        $this->tagId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSegmentId(): ?string
    {
        return $this->segmentId;
    }

    /**
     * @param ?string $value
     */
    public function setSegmentId(?string $value = null): self
    {
        $this->segmentId = $value;
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
