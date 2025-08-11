<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Exception;
use Intercom\Core\Json\JsonDecoder;

class Component extends JsonSerializableType
{
    /**
     * @var (
     *    'button'
     *   |'checkbox'
     *   |'dropdown'
     *   |'input'
     *   |'list'
     *   |'single-select'
     *   |'textarea'
     *   |'data-table'
     *   |'divider'
     *   |'image'
     *   |'spacer'
     *   |'text'
     *   |'_unknown'
     * ) $type
     */
    private readonly string $type;

    /**
     * @var (
     *    ButtonComponent
     *   |CheckboxComponent
     *   |DropdownComponent
     *   |InputComponent
     *   |ListComponent
     *   |SingleSelectComponent
     *   |TextAreaComponent
     *   |DataTableComponent
     *   |DividerComponent
     *   |ImageComponent
     *   |SpacerComponent
     *   |TextComponent
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'button'
     *   |'checkbox'
     *   |'dropdown'
     *   |'input'
     *   |'list'
     *   |'single-select'
     *   |'textarea'
     *   |'data-table'
     *   |'divider'
     *   |'image'
     *   |'spacer'
     *   |'text'
     *   |'_unknown'
     * ),
     *   value: (
     *    ButtonComponent
     *   |CheckboxComponent
     *   |DropdownComponent
     *   |InputComponent
     *   |ListComponent
     *   |SingleSelectComponent
     *   |TextAreaComponent
     *   |DataTableComponent
     *   |DividerComponent
     *   |ImageComponent
     *   |SpacerComponent
     *   |TextComponent
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return (
     *    'button'
     *   |'checkbox'
     *   |'dropdown'
     *   |'input'
     *   |'list'
     *   |'single-select'
     *   |'textarea'
     *   |'data-table'
     *   |'divider'
     *   |'image'
     *   |'spacer'
     *   |'text'
     *   |'_unknown'
     * )
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return (
     *    ButtonComponent
     *   |CheckboxComponent
     *   |DropdownComponent
     *   |InputComponent
     *   |ListComponent
     *   |SingleSelectComponent
     *   |TextAreaComponent
     *   |DataTableComponent
     *   |DividerComponent
     *   |ImageComponent
     *   |SpacerComponent
     *   |TextComponent
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param ButtonComponent $button
     * @return Component
     */
    public static function button(ButtonComponent $button): Component
    {
        return new Component([
            'type' => 'button',
            'value' => $button,
        ]);
    }

    /**
     * @param CheckboxComponent $checkbox
     * @return Component
     */
    public static function checkbox(CheckboxComponent $checkbox): Component
    {
        return new Component([
            'type' => 'checkbox',
            'value' => $checkbox,
        ]);
    }

    /**
     * @param DropdownComponent $dropdown
     * @return Component
     */
    public static function dropdown(DropdownComponent $dropdown): Component
    {
        return new Component([
            'type' => 'dropdown',
            'value' => $dropdown,
        ]);
    }

    /**
     * @param InputComponent $input
     * @return Component
     */
    public static function input(InputComponent $input): Component
    {
        return new Component([
            'type' => 'input',
            'value' => $input,
        ]);
    }

    /**
     * @param ListComponent $list
     * @return Component
     */
    public static function list(ListComponent $list): Component
    {
        return new Component([
            'type' => 'list',
            'value' => $list,
        ]);
    }

    /**
     * @param SingleSelectComponent $singleSelect
     * @return Component
     */
    public static function singleSelect(SingleSelectComponent $singleSelect): Component
    {
        return new Component([
            'type' => 'single-select',
            'value' => $singleSelect,
        ]);
    }

    /**
     * @param TextAreaComponent $textarea
     * @return Component
     */
    public static function textarea(TextAreaComponent $textarea): Component
    {
        return new Component([
            'type' => 'textarea',
            'value' => $textarea,
        ]);
    }

    /**
     * @param DataTableComponent $dataTable
     * @return Component
     */
    public static function dataTable(DataTableComponent $dataTable): Component
    {
        return new Component([
            'type' => 'data-table',
            'value' => $dataTable,
        ]);
    }

    /**
     * @param DividerComponent $divider
     * @return Component
     */
    public static function divider(DividerComponent $divider): Component
    {
        return new Component([
            'type' => 'divider',
            'value' => $divider,
        ]);
    }

    /**
     * @param ImageComponent $image
     * @return Component
     */
    public static function image(ImageComponent $image): Component
    {
        return new Component([
            'type' => 'image',
            'value' => $image,
        ]);
    }

    /**
     * @param SpacerComponent $spacer
     * @return Component
     */
    public static function spacer(SpacerComponent $spacer): Component
    {
        return new Component([
            'type' => 'spacer',
            'value' => $spacer,
        ]);
    }

    /**
     * @param TextComponent $text
     * @return Component
     */
    public static function text(TextComponent $text): Component
    {
        return new Component([
            'type' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->value instanceof ButtonComponent && $this->type === 'button';
    }

    /**
     * @return ButtonComponent
     */
    public function asButton(): ButtonComponent
    {
        if (!($this->value instanceof ButtonComponent && $this->type === 'button')) {
            throw new Exception(
                "Expected button; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCheckbox(): bool
    {
        return $this->value instanceof CheckboxComponent && $this->type === 'checkbox';
    }

    /**
     * @return CheckboxComponent
     */
    public function asCheckbox(): CheckboxComponent
    {
        if (!($this->value instanceof CheckboxComponent && $this->type === 'checkbox')) {
            throw new Exception(
                "Expected checkbox; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDropdown(): bool
    {
        return $this->value instanceof DropdownComponent && $this->type === 'dropdown';
    }

    /**
     * @return DropdownComponent
     */
    public function asDropdown(): DropdownComponent
    {
        if (!($this->value instanceof DropdownComponent && $this->type === 'dropdown')) {
            throw new Exception(
                "Expected dropdown; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isInput(): bool
    {
        return $this->value instanceof InputComponent && $this->type === 'input';
    }

    /**
     * @return InputComponent
     */
    public function asInput(): InputComponent
    {
        if (!($this->value instanceof InputComponent && $this->type === 'input')) {
            throw new Exception(
                "Expected input; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isList_(): bool
    {
        return $this->value instanceof ListComponent && $this->type === 'list';
    }

    /**
     * @return ListComponent
     */
    public function asList_(): ListComponent
    {
        if (!($this->value instanceof ListComponent && $this->type === 'list')) {
            throw new Exception(
                "Expected list; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSingleSelect(): bool
    {
        return $this->value instanceof SingleSelectComponent && $this->type === 'single-select';
    }

    /**
     * @return SingleSelectComponent
     */
    public function asSingleSelect(): SingleSelectComponent
    {
        if (!($this->value instanceof SingleSelectComponent && $this->type === 'single-select')) {
            throw new Exception(
                "Expected single-select; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTextarea(): bool
    {
        return $this->value instanceof TextAreaComponent && $this->type === 'textarea';
    }

    /**
     * @return TextAreaComponent
     */
    public function asTextarea(): TextAreaComponent
    {
        if (!($this->value instanceof TextAreaComponent && $this->type === 'textarea')) {
            throw new Exception(
                "Expected textarea; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDataTable(): bool
    {
        return $this->value instanceof DataTableComponent && $this->type === 'data-table';
    }

    /**
     * @return DataTableComponent
     */
    public function asDataTable(): DataTableComponent
    {
        if (!($this->value instanceof DataTableComponent && $this->type === 'data-table')) {
            throw new Exception(
                "Expected data-table; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDivider(): bool
    {
        return $this->value instanceof DividerComponent && $this->type === 'divider';
    }

    /**
     * @return DividerComponent
     */
    public function asDivider(): DividerComponent
    {
        if (!($this->value instanceof DividerComponent && $this->type === 'divider')) {
            throw new Exception(
                "Expected divider; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        return $this->value instanceof ImageComponent && $this->type === 'image';
    }

    /**
     * @return ImageComponent
     */
    public function asImage(): ImageComponent
    {
        if (!($this->value instanceof ImageComponent && $this->type === 'image')) {
            throw new Exception(
                "Expected image; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSpacer(): bool
    {
        return $this->value instanceof SpacerComponent && $this->type === 'spacer';
    }

    /**
     * @return SpacerComponent
     */
    public function asSpacer(): SpacerComponent
    {
        if (!($this->value instanceof SpacerComponent && $this->type === 'spacer')) {
            throw new Exception(
                "Expected spacer; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return $this->value instanceof TextComponent && $this->type === 'text';
    }

    /**
     * @return TextComponent
     */
    public function asText(): TextComponent
    {
        if (!($this->value instanceof TextComponent && $this->type === 'text')) {
            throw new Exception(
                "Expected text; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'button':
                $value = $this->asButton()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'checkbox':
                $value = $this->asCheckbox()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'dropdown':
                $value = $this->asDropdown()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'input':
                $value = $this->asInput()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'list':
                $value = $this->asList_()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'single-select':
                $value = $this->asSingleSelect()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'textarea':
                $value = $this->asTextarea()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'data-table':
                $value = $this->asDataTable()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'divider':
                $value = $this->asDivider()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'image':
                $value = $this->asImage()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'spacer':
                $value = $this->asSpacer()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'text':
                $value = $this->asText()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'button':
                $args['value'] = ButtonComponent::jsonDeserialize($data);
                break;
            case 'checkbox':
                $args['value'] = CheckboxComponent::jsonDeserialize($data);
                break;
            case 'dropdown':
                $args['value'] = DropdownComponent::jsonDeserialize($data);
                break;
            case 'input':
                $args['value'] = InputComponent::jsonDeserialize($data);
                break;
            case 'list':
                $args['value'] = ListComponent::jsonDeserialize($data);
                break;
            case 'single-select':
                $args['value'] = SingleSelectComponent::jsonDeserialize($data);
                break;
            case 'textarea':
                $args['value'] = TextAreaComponent::jsonDeserialize($data);
                break;
            case 'data-table':
                $args['value'] = DataTableComponent::jsonDeserialize($data);
                break;
            case 'divider':
                $args['value'] = DividerComponent::jsonDeserialize($data);
                break;
            case 'image':
                $args['value'] = ImageComponent::jsonDeserialize($data);
                break;
            case 'spacer':
                $args['value'] = SpacerComponent::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = TextComponent::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
