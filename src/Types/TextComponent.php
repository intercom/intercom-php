<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A text component is used for rendering blocks of text. Links and bold font can be rendered through Markdown. There are different styles provided which edit the color, weight, and font size. These cannot be edited through Markdown.
 */
class TextComponent extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $text The text that will be rendered.
     */
    #[JsonProperty('text')]
    private string $text;

    /**
     * @var ?value-of<TextComponentAlign> $align Aligns the text. Default is `left`.
     */
    #[JsonProperty('align')]
    private ?string $align;

    /**
     * @var ?value-of<TextComponentStyle> $style Styles the text. Default is `paragraph`.
     */
    #[JsonProperty('style')]
    private ?string $style;

    /**
     * @var ?'none' $bottomMargin Disables a component's margin-bottom of 10px.
     */
    #[JsonProperty('bottom_margin')]
    private ?string $bottomMargin;

    /**
     * @param array{
     *   text: string,
     *   id?: ?string,
     *   align?: ?value-of<TextComponentAlign>,
     *   style?: ?value-of<TextComponentStyle>,
     *   bottomMargin?: ?'none',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->text = $values['text'];
        $this->align = $values['align'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->bottomMargin = $values['bottomMargin'] ?? null;
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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $value
     */
    public function setText(string $value): self
    {
        $this->text = $value;
        return $this;
    }

    /**
     * @return ?value-of<TextComponentAlign>
     */
    public function getAlign(): ?string
    {
        return $this->align;
    }

    /**
     * @param ?value-of<TextComponentAlign> $value
     */
    public function setAlign(?string $value = null): self
    {
        $this->align = $value;
        return $this;
    }

    /**
     * @return ?value-of<TextComponentStyle>
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @param ?value-of<TextComponentStyle> $value
     */
    public function setStyle(?string $value = null): self
    {
        $this->style = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
