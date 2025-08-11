<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list component renders a list of items which you provide in an array. You can make each list item take an action by adding the relevant action object to the item:
 *
 * - [Trigger a submit request to be sent](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/submit-action) Inbox Messenger
 * - [Open a link in a new page](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/url-action) Inbox Messenger
 * - [Open a sheet](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/sheets-action) Messenger
 */
class ListComponent extends JsonSerializableType
{
    /**
     * @var array<(
     *    ListItemWithImage
     *   |ListItemWithoutImage
     * )> $items The items that will be rendered in the list.
     */
    #[JsonProperty('items'), ArrayType([new Union(ListItemWithImage::class, ListItemWithoutImage::class)])]
    private array $items;

    /**
     * @var ?bool $disabled Styles all list items and prevents the action. Default is `false`.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   items: array<(
     *    ListItemWithImage
     *   |ListItemWithoutImage
     * )>,
     *   disabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->disabled = $values['disabled'] ?? null;
    }

    /**
     * @return array<(
     *    ListItemWithImage
     *   |ListItemWithoutImage
     * )>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array<(
     *    ListItemWithImage
     *   |ListItemWithoutImage
     * )> $value
     */
    public function setItems(array $value): self
    {
        $this->items = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    /**
     * @param ?bool $value
     */
    public function setDisabled(?bool $value = null): self
    {
        $this->disabled = $value;
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
