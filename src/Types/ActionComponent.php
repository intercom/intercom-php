<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Exception;
use Intercom\Core\Json\JsonDecoder;

class ActionComponent extends JsonSerializableType
{
    /**
     * @var (
     *    'sheet'
     *   |'url'
     *   |'submit'
     *   |'_unknown'
     * ) $type
     */
    private readonly string $type;

    /**
     * @var (
     *    SheetActionComponent
     *   |UrlActionComponent
     *   |SubmitActionComponent
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'sheet'
     *   |'url'
     *   |'submit'
     *   |'_unknown'
     * ),
     *   value: (
     *    SheetActionComponent
     *   |UrlActionComponent
     *   |SubmitActionComponent
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
     *    'sheet'
     *   |'url'
     *   |'submit'
     *   |'_unknown'
     * )
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return (
     *    SheetActionComponent
     *   |UrlActionComponent
     *   |SubmitActionComponent
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param SheetActionComponent $sheet
     * @return ActionComponent
     */
    public static function sheet(SheetActionComponent $sheet): ActionComponent
    {
        return new ActionComponent([
            'type' => 'sheet',
            'value' => $sheet,
        ]);
    }

    /**
     * @param UrlActionComponent $url
     * @return ActionComponent
     */
    public static function url(UrlActionComponent $url): ActionComponent
    {
        return new ActionComponent([
            'type' => 'url',
            'value' => $url,
        ]);
    }

    /**
     * @param SubmitActionComponent $submit
     * @return ActionComponent
     */
    public static function submit(SubmitActionComponent $submit): ActionComponent
    {
        return new ActionComponent([
            'type' => 'submit',
            'value' => $submit,
        ]);
    }

    /**
     * @return bool
     */
    public function isSheet(): bool
    {
        return $this->value instanceof SheetActionComponent && $this->type === 'sheet';
    }

    /**
     * @return SheetActionComponent
     */
    public function asSheet(): SheetActionComponent
    {
        if (!($this->value instanceof SheetActionComponent && $this->type === 'sheet')) {
            throw new Exception(
                "Expected sheet; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isUrl(): bool
    {
        return $this->value instanceof UrlActionComponent && $this->type === 'url';
    }

    /**
     * @return UrlActionComponent
     */
    public function asUrl(): UrlActionComponent
    {
        if (!($this->value instanceof UrlActionComponent && $this->type === 'url')) {
            throw new Exception(
                "Expected url; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSubmit(): bool
    {
        return $this->value instanceof SubmitActionComponent && $this->type === 'submit';
    }

    /**
     * @return SubmitActionComponent
     */
    public function asSubmit(): SubmitActionComponent
    {
        if (!($this->value instanceof SubmitActionComponent && $this->type === 'submit')) {
            throw new Exception(
                "Expected submit; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'sheet':
                $value = $this->asSheet()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'url':
                $value = $this->asUrl()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'submit':
                $value = $this->asSubmit()->jsonSerialize();
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
            case 'sheet':
                $args['value'] = SheetActionComponent::jsonDeserialize($data);
                break;
            case 'url':
                $args['value'] = UrlActionComponent::jsonDeserialize($data);
                break;
            case 'submit':
                $args['value'] = SubmitActionComponent::jsonDeserialize($data);
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
