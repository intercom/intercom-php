<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The content object is where you specify the UI of your app. You provide us with a set of `components` in a components array that we then render.
 *
 * The content object should usually be returned within the [canvas object](https://developers.intercom.com/docs/references/canvas-kit/responseobjects/canvas). If you're responding to a Live Canvas request however, then you should only respond with the content object.
 */
class ContentObject extends JsonSerializableType
{
    /**
     * @var array<Component> $components The list of components to be rendered.
     */
    #[JsonProperty('components'), ArrayType([Component::class])]
    private array $components;

    /**
     * @param array{
     *   components: array<Component>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->components = $values['components'];
    }

    /**
     * @return array<Component>
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param array<Component> $value
     */
    public function setComponents(array $value): self
    {
        $this->components = $value;
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
