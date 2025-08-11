<?php

namespace Intercom\Unstable\Macros\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListMacrosRequest extends JsonSerializableType
{
    /**
     * @var ?int $perPage The number of results per page
     */
    private ?int $perPage;

    /**
     * @var ?string $startingAfter Base64-encoded cursor containing [updated_at, id] for pagination
     */
    private ?string $startingAfter;

    /**
     * @var ?int $updatedSince Unix timestamp to filter macros updated after this time
     */
    private ?int $updatedSince;

    /**
     * @param array{
     *   perPage?: ?int,
     *   startingAfter?: ?string,
     *   updatedSince?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->perPage = $values['perPage'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->updatedSince = $values['updatedSince'] ?? null;
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

    /**
     * @return ?int
     */
    public function getUpdatedSince(): ?int
    {
        return $this->updatedSince;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedSince(?int $value = null): self
    {
        $this->updatedSince = $value;
        return $this;
    }
}
