<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\Union;

/**
 * Search using Intercoms Search APIs.
 */
class SearchRequest extends JsonSerializableType
{
    /**
     * @var (
     *    SingleFilterSearchRequest
     *   |MultipleFilterSearchRequest
     * ) $query
     */
    #[JsonProperty('query'), Union(SingleFilterSearchRequest::class, MultipleFilterSearchRequest::class)]
    private SingleFilterSearchRequest|MultipleFilterSearchRequest $query;

    /**
     * @var ?StartingAfterPaging $pagination
     */
    #[JsonProperty('pagination')]
    private ?StartingAfterPaging $pagination;

    /**
     * @param array{
     *   query: (
     *    SingleFilterSearchRequest
     *   |MultipleFilterSearchRequest
     * ),
     *   pagination?: ?StartingAfterPaging,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->query = $values['query'];
        $this->pagination = $values['pagination'] ?? null;
    }

    /**
     * @return (
     *    SingleFilterSearchRequest
     *   |MultipleFilterSearchRequest
     * )
     */
    public function getQuery(): SingleFilterSearchRequest|MultipleFilterSearchRequest
    {
        return $this->query;
    }

    /**
     * @param (
     *    SingleFilterSearchRequest
     *   |MultipleFilterSearchRequest
     * ) $value
     */
    public function setQuery(SingleFilterSearchRequest|MultipleFilterSearchRequest $value): self
    {
        $this->query = $value;
        return $this;
    }

    /**
     * @return ?StartingAfterPaging
     */
    public function getPagination(): ?StartingAfterPaging
    {
        return $this->pagination;
    }

    /**
     * @param ?StartingAfterPaging $value
     */
    public function setPagination(?StartingAfterPaging $value = null): self
    {
        $this->pagination = $value;
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
