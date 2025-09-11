<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\HelpCenter\Types\Collection;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of Collections for the App.
 */
class CollectionList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object - `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?OffsetPages $pages
     */
    #[JsonProperty('pages')]
    private ?OffsetPages $pages;

    /**
     * @var ?int $totalCount A count of the total number of collections.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?array<Collection> $data An array of collection objects
     */
    #[JsonProperty('data'), ArrayType([Collection::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   pages?: ?OffsetPages,
     *   totalCount?: ?int,
     *   data?: ?array<Collection>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->pages = $values['pages'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?OffsetPages
     */
    public function getPages(): ?OffsetPages
    {
        return $this->pages;
    }

    /**
     * @param ?OffsetPages $value
     */
    public function setPages(?OffsetPages $value = null): self
    {
        $this->pages = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?array<Collection>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Collection> $value
     */
    public function setData(?array $value = null): self
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
