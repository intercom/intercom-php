<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConfigureResponseCanvas extends JsonSerializableType
{
    /**
     * @var CanvasObject $canvas The canvas object that defines the new UI to be shown. This will replace the previous canvas that was visible until the teammate interacted with your app.
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
