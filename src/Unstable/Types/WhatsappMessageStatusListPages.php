<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class WhatsappMessageStatusListPages extends JsonSerializableType
{
    /**
     * @var 'pages' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $perPage Number of results per page
     */
    #[JsonProperty('per_page')]
    private int $perPage;

    /**
     * @var int $totalPages Total number of pages
     */
    #[JsonProperty('total_pages')]
    private int $totalPages;

    /**
     * @var ?WhatsappMessageStatusListPagesNext $next Information for fetching next page (null if no more pages)
     */
    #[JsonProperty('next')]
    private ?WhatsappMessageStatusListPagesNext $next;

    /**
     * @param array{
     *   type: 'pages',
     *   perPage: int,
     *   totalPages: int,
     *   next?: ?WhatsappMessageStatusListPagesNext,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->perPage = $values['perPage'];
        $this->totalPages = $values['totalPages'];
        $this->next = $values['next'] ?? null;
    }

    /**
     * @return 'pages'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'pages' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $value
     */
    public function setPerPage(int $value): self
    {
        $this->perPage = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $value
     */
    public function setTotalPages(int $value): self
    {
        $this->totalPages = $value;
        return $this;
    }

    /**
     * @return ?WhatsappMessageStatusListPagesNext
     */
    public function getNext(): ?WhatsappMessageStatusListPagesNext
    {
        return $this->next;
    }

    /**
     * @param ?WhatsappMessageStatusListPagesNext $value
     */
    public function setNext(?WhatsappMessageStatusListPagesNext $value = null): self
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
