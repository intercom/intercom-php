<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A data-table component is used for rendering a table of key-value pairs. For Messenger, text will wrap around on multiple lines. For Inbox and Frame (ie. Configure) views, we will truncate and use tooltips on hover if the text overflows.
 */
class DataTableComponent extends JsonSerializableType
{
    /**
     * @var array<DataTableItem> $items The items that will be rendered in the data-table.
     */
    #[JsonProperty('items'), ArrayType([DataTableItem::class])]
    private array $items;

    /**
     * @param array{
     *   items: array<DataTableItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
    }

    /**
     * @return array<DataTableItem>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array<DataTableItem> $value
     */
    public function setItems(array $value): self
    {
        $this->items = $value;
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
