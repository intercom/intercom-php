<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The response object returned when initializing an app, specifying the UI for the first screen using components.
 */
class InitializeResponse extends JsonSerializableType
{
    /**
     * @var CanvasObject $canvas The canvas object that defines the UI to be shown for the app.
     */
    #[JsonProperty('canvas')]
    private CanvasObject $canvas;

    /**
     * @param array{
     *   canvas: CanvasObject,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canvas = $values['canvas'];
    }

    /**
     * @return CanvasObject
     */
    public function getCanvas(): CanvasObject
    {
        return $this->canvas;
    }

    /**
     * @param CanvasObject $value
     */
    public function setCanvas(CanvasObject $value): self
    {
        $this->canvas = $value;
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
