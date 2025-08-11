<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Exception;
use Intercom\Core\Json\JsonDecoder;

/**
 * You can create a message
 */
class CreateMessageRequest extends JsonSerializableType
{
    /**
     * @var (
     *    'email'
     *   |'inapp'
     *   |'_unknown'
     * ) $messageType
     */
    private readonly string $messageType;

    /**
     * @var (
     *    CreateMessageRequestWithEmail
     *   |CreateMessageRequestWithInapp
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   messageType: (
     *    'email'
     *   |'inapp'
     *   |'_unknown'
     * ),
     *   value: (
     *    CreateMessageRequestWithEmail
     *   |CreateMessageRequestWithInapp
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->messageType = $values['messageType'];
        $this->value = $values['value'];
    }

    /**
     * @return (
     *    'email'
     *   |'inapp'
     *   |'_unknown'
     * )
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @return (
     *    CreateMessageRequestWithEmail
     *   |CreateMessageRequestWithInapp
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param CreateMessageRequestWithEmail $email
     * @return CreateMessageRequest
     */
    public static function email(CreateMessageRequestWithEmail $email): CreateMessageRequest
    {
        return new CreateMessageRequest([
            'messageType' => 'email',
            'value' => $email,
        ]);
    }

    /**
     * @param CreateMessageRequestWithInapp $inapp
     * @return CreateMessageRequest
     */
    public static function inapp(CreateMessageRequestWithInapp $inapp): CreateMessageRequest
    {
        return new CreateMessageRequest([
            'messageType' => 'inapp',
            'value' => $inapp,
        ]);
    }

    /**
     * @return bool
     */
    public function isEmail(): bool
    {
        return $this->value instanceof CreateMessageRequestWithEmail && $this->messageType === 'email';
    }

    /**
     * @return CreateMessageRequestWithEmail
     */
    public function asEmail(): CreateMessageRequestWithEmail
    {
        if (!($this->value instanceof CreateMessageRequestWithEmail && $this->messageType === 'email')) {
            throw new Exception(
                "Expected email; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isInapp(): bool
    {
        return $this->value instanceof CreateMessageRequestWithInapp && $this->messageType === 'inapp';
    }

    /**
     * @return CreateMessageRequestWithInapp
     */
    public function asInapp(): CreateMessageRequestWithInapp
    {
        if (!($this->value instanceof CreateMessageRequestWithInapp && $this->messageType === 'inapp')) {
            throw new Exception(
                "Expected inapp; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
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
        $result['message_type'] = $this->messageType;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->messageType) {
            case 'email':
                $value = $this->asEmail()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'inapp':
                $value = $this->asInapp()->jsonSerialize();
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
        if (!array_key_exists('message_type', $data)) {
            throw new Exception(
                "JSON data is missing property 'message_type'",
            );
        }
        $messageType = $data['message_type'];
        if (!(is_string($messageType))) {
            throw new Exception(
                "Expected property 'messageType' in JSON data to be string, instead received " . get_debug_type($data['message_type']),
            );
        }

        $args['messageType'] = $messageType;
        switch ($messageType) {
            case 'email':
                $args['value'] = CreateMessageRequestWithEmail::jsonDeserialize($data);
                break;
            case 'inapp':
                $args['value'] = CreateMessageRequestWithInapp::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['messageType'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
