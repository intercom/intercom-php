<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListAttachedCompaniesRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
     */
    private string $contactId;

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
     *   contactId: string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return string
     */
    public function getContactId(): string
    {
        return $this->contactId;
    }

    /**
     * @param string $value
     */
    public function setContactId(string $value): self
    {
        $this->contactId = $value;
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
