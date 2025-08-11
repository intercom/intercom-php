<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A single select option component that can be selected.
 */
class SingleSelectOption extends JsonSerializableType
{
    /**
     * @var 'option' $type The type of component you are rendering.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id A unique identifier for the option.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $text The text shown within this option.
     */
    #[JsonProperty('text')]
    private string $text;

    /**
     * @var ?bool $disabled Styles the option and prevents the action. Default is false.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   type: 'option',
     *   id: string,
     *   text: string,
     *   disabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->text = $values['text'];
        $this->disabled = $values['disabled'] ?? null;
    }

    /**
     * @return 'option'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'option' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $value
     */
    public function setText(string $value): self
    {
        $this->text = $value;
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
