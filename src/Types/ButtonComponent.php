<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A button component is used to take an action by clicking a button. This can either:
 * - [Trigger a submit request to be sent](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/submit-action) Inbox Messenger
 * - [Open a link in a new page](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/url-action) Inbox Messenger
 * - [Open a sheet](https://developers.intercom.com/docs/references/canvas-kit/actioncomponents/sheets-action) Messenger
 */
class ButtonComponent extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the component.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $label The text that will be rendered inside the button.
     */
    #[JsonProperty('label')]
    private string $label;

    /**
     * @var ActionComponent $action This can be a Submit Action, URL Action, or Sheets Action.
     */
    #[JsonProperty('action')]
    private ActionComponent $action;

    /**
     * @var ?value-of<ButtonComponentStyle> $style Styles the button. Default is 'primary'.
     */
    #[JsonProperty('style')]
    private ?string $style;

    /**
     * @var ?bool $disabled Styles the button and prevents the action. Default is false.
     */
    #[JsonProperty('disabled')]
    private ?bool $disabled;

    /**
     * @param array{
     *   id: string,
     *   label: string,
     *   action: ActionComponent,
     *   style?: ?value-of<ButtonComponentStyle>,
     *   disabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->label = $values['label'];
        $this->action = $values['action'];
        $this->style = $values['style'] ?? null;
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
     * @return ActionComponent
     */
    public function getAction(): ActionComponent
    {
        return $this->action;
    }

    /**
     * @param ActionComponent $value
     */
    public function setAction(ActionComponent $value): self
    {
        $this->action = $value;
        return $this;
    }

    /**
     * @return ?value-of<ButtonComponentStyle>
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @param ?value-of<ButtonComponentStyle> $value
     */
    public function setStyle(?string $value = null): self
    {
        $this->style = $value;
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
