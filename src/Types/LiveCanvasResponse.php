<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The response object returned when responding to a Live Canvas request. This contains the components you want to show.
 */
class LiveCanvasResponse extends JsonSerializableType
{
    /**
     * @var ContentObject $content The content object that defines the components to be shown.
     */
    #[JsonProperty('content')]
    private ContentObject $content;

    /**
     * @param array{
     *   content: ContentObject,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'];
    }

    /**
     * @return ContentObject
     */
    public function getContent(): ContentObject
    {
        return $this->content;
    }

    /**
     * @param ContentObject $value
     */
    public function setContent(ContentObject $value): self
    {
        $this->content = $value;
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
