<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A list item component that can be rendered in a list.
 */
class ListItem extends JsonSerializableType
{
    /**
     * @var 'item' $type The type of component you are rendering.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id A unique identifier for the item.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $title The text shown as the title for the item.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var ?string $subtitle The text shown underneath the item's title.
     */
    #[JsonProperty('subtitle')]
    private ?string $subtitle;

    /**
     * @var ?string $tertiaryText The text shown next to the subtitle, separates by a bullet.
     */
    #[JsonProperty('tertiary_text')]
    private ?string $tertiaryText;

    /**
     * @var ?bool $roundedImage Rounds the corners of the image. Default is `false`.
     */
    #[JsonProperty('rounded_image')]
    private ?bool $roundedImage;

    /**
     * @var ?bool $disabled Styles all list items and prevents the action. Default is `false`.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @var ?ActionComponent $action This can be a Submit Action, URL Action, or Sheets Action.
     */
    #[JsonProperty('action')]
    private ?ActionComponent $action;

    /**
     * @param array{
     *   type: 'item',
     *   id: string,
     *   title: string,
     *   subtitle?: ?string,
     *   tertiaryText?: ?string,
     *   roundedImage?: ?bool,
     *   disabled?: ?bool,
     *   action?: ?ActionComponent,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->subtitle = $values['subtitle'] ?? null;
        $this->tertiaryText = $values['tertiaryText'] ?? null;
        $this->roundedImage = $values['roundedImage'] ?? null;
        $this->disabled = $values['disabled'] ?? null;
        $this->action = $values['action'] ?? null;
    }

    /**
     * @return 'item'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'item' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @param ?string $value
     */
    public function setSubtitle(?string $value = null): self
    {
        $this->subtitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTertiaryText(): ?string
    {
        return $this->tertiaryText;
    }

    /**
     * @param ?string $value
     */
    public function setTertiaryText(?string $value = null): self
    {
        $this->tertiaryText = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRoundedImage(): ?bool
    {
        return $this->roundedImage;
    }

    /**
     * @param ?bool $value
     */
    public function setRoundedImage(?bool $value = null): self
    {
        $this->roundedImage = $value;
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
     * @return ?ActionComponent
     */
    public function getAction(): ?ActionComponent
    {
        return $this->action;
    }

    /**
     * @param ?ActionComponent $value
     */
    public function setAction(?ActionComponent $value = null): self
    {
        $this->action = $value;
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
