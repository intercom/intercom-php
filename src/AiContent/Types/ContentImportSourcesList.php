<?php

namespace Intercom\AiContent\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\PagesLink;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of the content import sources for the App.
 */
class ContentImportSourcesList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object - `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?PagesLink $pages
     */
    #[JsonProperty('pages')]
    private ?PagesLink $pages;

    /**
     * @var ?int $totalCount A count of the total number of content import sources.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?array<ContentImportSource> $data An array of Content Import Source objects
     */
    #[JsonProperty('data'), ArrayType([ContentImportSource::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   pages?: ?PagesLink,
     *   totalCount?: ?int,
     *   data?: ?array<ContentImportSource>,
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
     * @return ?PagesLink
     */
    public function getPages(): ?PagesLink
    {
        return $this->pages;
    }

    /**
     * @param ?PagesLink $value
     */
    public function setPages(?PagesLink $value = null): self
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
     * @return ?array<ContentImportSource>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<ContentImportSource> $value
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
