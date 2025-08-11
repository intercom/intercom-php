<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * An input component is used to capture text input from the end user. You can submit the value of the input by:
 *
 * - Adding an `action` to the input component (which will render an inline button)
 * - Using a ButtonComponent (which will submit all interactive components in the canvas)
 */
class InputComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var ?string $label The text shown above the input.
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
     * @var ?ActionComponent $action This can be a Submit Action, URL Action, or Sheets Action.
     */
    #[JsonProperty('action')]
    private ?ActionComponent $action;

    /**
     * @var ?value-of<InputComponentSaveState> $saveState Styles the input. Default is `unsaved`. Prevent action with `saved`.
     */
    #[JsonProperty('save_state')]
    private ?string $saveState;

    /**
     * @var ?bool $disabled Styles the input and prevents the action. Default is false. Will be overridden if save_state is saved.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   id: string,
     *   label?: ?string,
     *   placeholder?: ?string,
     *   value?: ?string,
     *   action?: ?ActionComponent,
     *   saveState?: ?value-of<InputComponentSaveState>,
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
        $this->action = $values['action'] ?? null;
        $this->saveState = $values['saveState'] ?? null;
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
     * @return ?ActionComponent
     */
    public function getAction(): ?ActionComponent
    {
        return $this->action;
    }

    /**
     * @param ?ActionComponent $value
     */
    public function setAction(?ActionComponent $value = null): self
    {
        $this->action = $value;
        return $this;
    }

    /**
     * @return ?value-of<InputComponentSaveState>
     */
    public function getSaveState(): ?string
    {
        return $this->saveState;
    }

    /**
     * @param ?value-of<InputComponentSaveState> $value
     */
    public function setSaveState(?string $value = null): self
    {
        $this->saveState = $value;
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
