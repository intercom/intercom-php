<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A text area component is used to capture a large amount of text as input with a multi-line text box. You can submit the value of the text area by:
 *
 * - Using a ButtonComponent (which will submit all interactive components in the canvas)
 */
class TextAreaComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var ?string $label The text shown above the text area.
     */
    #[JsonProperty('label')]
    private ?string $label;

    /**
     * @var ?string $placeholder An example value shown inside the component when it's empty.
     */
    #[JsonProperty('placeholder')]
    private ?string $placeholder;

    /**
     * @var ?string $value An entered value which is already inside the component.
     */
    #[JsonProperty('value')]
    private ?string $value;

    /**
     * @var ?bool $error Styles the input as failed. Default is false.
     */
    #[JsonProperty('error')]
    private ?bool $error;

    /**
     * @var ?bool $disabled Styles the input and prevents the action. Default is false.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   id: string,
     *   label?: ?string,
     *   placeholder?: ?string,
     *   value?: ?string,
     *   error?: ?bool,
     *   disabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->label = $values['label'] ?? null;
        $this->placeholder = $values['placeholder'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->disabled = $values['disabled'] ?? null;
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
     * @return ?string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param ?string $value
     */
    public function setLabel(?string $value = null): self
    {
        $this->label = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param ?string $value
     */
    public function setPlaceholder(?string $value = null): self
    {
        $this->placeholder = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param ?string $value
     */
    public function setValue(?string $value = null): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getError(): ?bool
    {
        return $this->error;
    }

    /**
     * @param ?bool $value
     */
    public function setError(?bool $value = null): self
    {
        $this->error = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
