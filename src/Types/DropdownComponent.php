<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A dropdown component is used to capture a choice from the options that you provide.
 *
 * When submitted, the dropdown choices are returned in a hash with the id from the dropdown component used as the key and the id from the chosen option as the value.
 */
class DropdownComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var array<DropdownOption> $options The list of options. Can provide 2 to 10.
     */
    #[JsonProperty('options'), ArrayType([DropdownOption::class])]
    private array $options;

    /**
     * @var ?string $label The text shown above the dropdown.
     */
    #[JsonProperty('label')]
    private ?string $label;

    /**
     * @var ?string $value The option that is selected by default.
     */
    #[JsonProperty('value')]
    private ?string $value;

    /**
     * @var ?value-of<DropdownComponentSaveState> $saveState Styles all options and prevents the action. Default is `unsaved`. Will be overridden if `save_state` is `saved`.
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
     *   options: array<DropdownOption>,
     *   label?: ?string,
     *   value?: ?string,
     *   saveState?: ?value-of<DropdownComponentSaveState>,
     *   disabled?: ?bool,
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
     * @return array<DropdownOption>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<DropdownOption> $value
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
     * @return ?value-of<DropdownComponentSaveState>
     */
    public function getSaveState(): ?string
    {
        return $this->saveState;
    }

    /**
     * @param ?value-of<DropdownComponentSaveState> $value
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
