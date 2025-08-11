<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An image component is used to display an image.
 *
 * HTTPS Images:
 * If your request URLs (or website URLs) are over HTTPS, you will need to ensure that images are loaded over HTTPS likewise. Otherwise, they will not work.
 */
class ImageComponent extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $url The URL where the image is located.
     */
    #[JsonProperty('url')]
    private string $url;

    /**
     * @var ?value-of<ImageComponentAlign> $align Aligns the image inside the component. Default is `left`.
     */
    #[JsonProperty('align')]
    private ?string $align;

    /**
     * @var int $width The exact width of the image in pixels.
     */
    #[JsonProperty('width')]
    private int $width;

    /**
     * @var int $height The exact height of the image in pixels.
     */
    #[JsonProperty('height')]
    private int $height;

    /**
     * @var ?bool $rounded Rounds the corners of the image. Default is `false`.
     */
    #[JsonProperty('rounded')]
    private ?bool $rounded;

    /**
     * @var ?'none' $bottomMargin Disables a component's margin-bottom of 10px.
     */
    #[JsonProperty('bottom_margin')]
    private ?string $bottomMargin;

    /**
     * @var ?UrlActionComponent $action This can be a URL Action only.
     */
    #[JsonProperty('action')]
    private ?UrlActionComponent $action;

    /**
     * @param array{
     *   url: string,
     *   width: int,
     *   height: int,
     *   id?: ?string,
     *   align?: ?value-of<ImageComponentAlign>,
     *   rounded?: ?bool,
     *   bottomMargin?: ?'none',
     *   action?: ?UrlActionComponent,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->url = $values['url'];
        $this->align = $values['align'] ?? null;
        $this->width = $values['width'];
        $this->height = $values['height'];
        $this->rounded = $values['rounded'] ?? null;
        $this->bottomMargin = $values['bottomMargin'] ?? null;
        $this->action = $values['action'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $value
     */
    public function setUrl(string $value): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?value-of<ImageComponentAlign>
     */
    public function getAlign(): ?string
    {
        return $this->align;
    }

    /**
     * @param ?value-of<ImageComponentAlign> $value
     */
    public function setAlign(?string $value = null): self
    {
        $this->align = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $value
     */
    public function setWidth(int $value): self
    {
        $this->width = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $value
     */
    public function setHeight(int $value): self
    {
        $this->height = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRounded(): ?bool
    {
        return $this->rounded;
    }

    /**
     * @param ?bool $value
     */
    public function setRounded(?bool $value = null): self
    {
        $this->rounded = $value;
        return $this;
    }

    /**
     * @return ?'none'
     */
    public function getBottomMargin(): ?string
    {
        return $this->bottomMargin;
    }

    /**
     * @param ?'none' $value
     */
    public function setBottomMargin(?string $value = null): self
    {
        $this->bottomMargin = $value;
        return $this;
    }

    /**
     * @return ?UrlActionComponent
     */
    public function getAction(): ?UrlActionComponent
    {
        return $this->action;
    }

    /**
     * @param ?UrlActionComponent $value
     */
    public function setAction(?UrlActionComponent $value = null): self
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
