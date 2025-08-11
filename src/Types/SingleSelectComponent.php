<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A single-select component is used to capture a choice from up to 10 options that you provide. You can submit the value of the select option by:
 *
 * - Adding an `action` to the single-select component
 * - Using a ButtonComponent (which will submit all interactive components in the canvas)
 *
 * When a submit action takes place, the results are given in a hash with the `id` from the single-select component used as the key and the `id` from the chosen option as the value.
 */
class SingleSelectComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var array<SingleSelectOption> $options The list of options. Can provide 2 to 10.
     */
    #[JsonProperty('options'), ArrayType([SingleSelectOption::class])]
    private array $options;

    /**
     * @var ?string $label The text shown above the options.
     */
    #[JsonProperty('label')]
    private ?string $label;

    /**
     * @var ?string $value The option that is selected by default.
     */
    #[JsonProperty('value')]
    private ?string $value;

    /**
     * @var ?value-of<SingleSelectComponentSaveState> $saveState Styles the input. Default is `unsaved`. Prevent action with `saved`.
     */
    #[JsonProperty('save_state')]
    private ?string $saveState;

    /**
     * @var ?bool $disabled Styles all options and prevents the action. Default is false. Will be overridden if save_state is saved.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @var ?ActionComponent $action This can be a Submit Action, URL Action, or Sheets Action.
     */
    #[JsonProperty('action')]
    private ?ActionComponent $action;

    /**
     * @param array{
     *   id: string,
     *   options: array<SingleSelectOption>,
     *   label?: ?string,
     *   value?: ?string,
     *   saveState?: ?value-of<SingleSelectComponentSaveState>,
     *   disabled?: ?bool,
     *   action?: ?ActionComponent,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->options = $values['options'];
        $this->label = $values['label'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->saveState = $values['saveState'] ?? null;
        $this->disabled = $values['disabled'] ?? null;
        $this->action = $values['action'] ?? null;
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
     * @return array<SingleSelectOption>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<SingleSelectOption> $value
     */
    public function setOptions(array $value): self
    {
        $this->options = $value;
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
     * @return ?value-of<SingleSelectComponentSaveState>
     */
    public function getSaveState(): ?string
    {
        return $this->saveState;
    }

    /**
     * @param ?value-of<SingleSelectComponentSaveState> $value
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
