<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A checkbox component is used to capture multiple choices from as many options as you want to provide. You can submit the options by:
 *
 * - Using a ButtonComponent (which will submit all interactive components in the canvas)
 *
 * When a submit action takes place, the results are given in a hash with the `id` from the checkbox component used as the key and an array containing the `id` of each chosen option as the value.
 */
class CheckboxComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var array<CheckboxOption> $option The list of options. Minimum of 1.
     */
    #[JsonProperty('option'), ArrayType([CheckboxOption::class])]
    private array $option;

    /**
     * @var string $label The text shown above the options.
     */
    #[JsonProperty('label')]
    private string $label;

    /**
     * @var ?array<string> $value The option's that are selected by default.
     */
    #[JsonProperty('value'), ArrayType(['string'])]
    private ?array $value;

    /**
     * @var ?value-of<CheckboxComponentSaveState> $saveState Styles the input. Default is `unsaved`. Prevent action with `saved`.
     */
    #[JsonProperty('save_state')]
    private ?string $saveState;

    /**
     * @var ?bool $disabled Styles all options and prevents the action. Default is false. Will be overridden if save_state is saved.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   id: string,
     *   option: array<CheckboxOption>,
     *   label: string,
     *   value?: ?array<string>,
     *   saveState?: ?value-of<CheckboxComponentSaveState>,
     *   disabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->option = $values['option'];
        $this->label = $values['label'];
        $this->value = $values['value'] ?? null;
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
     * @return array<CheckboxOption>
     */
    public function getOption(): array
    {
        return $this->option;
    }

    /**
     * @param array<CheckboxOption> $value
     */
    public function setOption(array $value): self
    {
        $this->option = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $value
     */
    public function setLabel(string $value): self
    {
        $this->label = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @param ?array<string> $value
     */
    public function setValue(?array $value = null): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return ?value-of<CheckboxComponentSaveState>
     */
    public function getSaveState(): ?string
    {
        return $this->saveState;
    }

    /**
     * @param ?value-of<CheckboxComponentSaveState> $value
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
