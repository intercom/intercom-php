<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The current canvas that was most recently showing before the request was sent. This object mirrors the same format as the Canvas Object.
 */
class CurrentCanvas extends JsonSerializableType
{
    /**
     * @var CanvasObject $currentCanvas The canvas object representing the current canvas state.
     */
    #[JsonProperty('current_canvas')]
    private CanvasObject $currentCanvas;

    /**
     * @param array{
     *   currentCanvas: CanvasObject,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currentCanvas = $values['currentCanvas'];
    }

    /**
     * @return CanvasObject
     */
    public function getCurrentCanvas(): CanvasObject
    {
        return $this->currentCanvas;
    }

    /**
     * @param CanvasObject $value
     */
    public function setCurrentCanvas(CanvasObject $value): self
    {
        $this->currentCanvas = $value;
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
