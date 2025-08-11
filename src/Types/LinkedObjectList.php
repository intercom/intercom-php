<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * An object containing metadata about linked conversations and linked tickets. Up to 1000 can be returned.
 */
class LinkedObjectList extends JsonSerializableType
{
    /**
     * @var 'list' $type Always list.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $totalCount The total number of linked objects.
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var bool $hasMore Whether or not there are more linked objects than returned.
     */
    #[JsonProperty('has_more')]
    private bool $hasMore;

    /**
     * @var array<LinkedObject> $data An array containing the linked conversations and linked tickets.
     */
    #[JsonProperty('data'), ArrayType([LinkedObject::class])]
    private array $data;

    /**
     * @param array{
     *   type: 'list',
     *   totalCount: int,
     *   hasMore: bool,
     *   data: array<LinkedObject>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->totalCount = $values['totalCount'];
        $this->hasMore = $values['hasMore'];
        $this->data = $values['data'];
    }

    /**
     * @return 'list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $value
     */
    public function setTotalCount(int $value): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasMore(): bool
    {
        return $this->hasMore;
    }

    /**
     * @param bool $value
     */
    public function setHasMore(bool $value): self
    {
        $this->hasMore = $value;
        return $this;
    }

    /**
     * @return array<LinkedObject>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array<LinkedObject> $value
     */
    public function setData(array $value): self
    {
        $this->data = $value;
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
