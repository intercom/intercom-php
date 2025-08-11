<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Traits\ListItem;
use Intercom\Core\Json\JsonProperty;

class ListItemWithImage extends JsonSerializableType
{
    use ListItem;

    /**
     * @var string $image An image that will be displayed to the left of the item.
     */
    #[JsonProperty('image')]
    private string $image;

    /**
     * @var int $imageWidth The exact width of the image in pixels.
     */
    #[JsonProperty('image_width')]
    private int $imageWidth;

    /**
     * @var int $imageHeight The exact height of the image in pixels.
     */
    #[JsonProperty('image_height')]
    private int $imageHeight;

    /**
     * @param array{
     *   type: 'item',
     *   id: string,
     *   title: string,
     *   image: string,
     *   imageWidth: int,
     *   imageHeight: int,
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
        $this->image = $values['image'];
        $this->imageWidth = $values['imageWidth'];
        $this->imageHeight = $values['imageHeight'];
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $value
     */
    public function setImage(string $value): self
    {
        $this->image = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageWidth(): int
    {
        return $this->imageWidth;
    }

    /**
     * @param int $value
     */
    public function setImageWidth(int $value): self
    {
        $this->imageWidth = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageHeight(): int
    {
        return $this->imageHeight;
    }

    /**
     * @param int $value
     */
    public function setImageHeight(int $value): self
    {
        $this->imageHeight = $value;
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
