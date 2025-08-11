<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?int $perPage How many results per page
     */
    private ?int $perPage;

    /**
     * @var ?string $startingAfter String used to get the next page of conversations.
     */
    private ?string $startingAfter;

    /**
     * @param array{
     *   perPage?: ?int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->perPage = $values['perPage'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
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
