<?php

namespace Intercom\Articles\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A highlighted article title.
 */
class ArticleSearchHighlightsHighlightedTitleItem extends JsonSerializableType
{
    /**
     * @var ?value-of<ArticleSearchHighlightsHighlightedTitleItemType> $type The type of text - `highlight` or `plain`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $text The text of the title.
     */
    #[JsonProperty('text')]
    private ?string $text;

    /**
     * @param array{
     *   type?: ?value-of<ArticleSearchHighlightsHighlightedTitleItemType>,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return ?value-of<ArticleSearchHighlightsHighlightedTitleItemType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<ArticleSearchHighlightsHighlightedTitleItemType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param ?string $value
     */
    public function setText(?string $value = null): self
    {
        $this->text = $value;
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
