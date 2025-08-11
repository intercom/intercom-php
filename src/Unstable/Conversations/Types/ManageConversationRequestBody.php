<?php

namespace Intercom\Unstable\Conversations\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Types\CloseConversationRequest;
use Intercom\Unstable\Types\SnoozeConversationRequest;
use Intercom\Unstable\Types\OpenConversationRequest;
use Intercom\Unstable\Types\AssignConversationRequest;
use Exception;
use Intercom\Core\Json\JsonDecoder;

class ManageConversationRequestBody extends JsonSerializableType
{
    /**
     * @var (
     *    'close'
     *   |'snoozed'
     *   |'open'
     *   |'assignment'
     *   |'_unknown'
     * ) $messageType
     */
    private readonly string $messageType;

    /**
     * @var (
     *    CloseConversationRequest
     *   |SnoozeConversationRequest
     *   |OpenConversationRequest
     *   |AssignConversationRequest
     *   |mixed
     * ) $value
     */
    private readonly mixed $value;

    /**
     * @param array{
     *   messageType: (
     *    'close'
     *   |'snoozed'
     *   |'open'
     *   |'assignment'
     *   |'_unknown'
     * ),
     *   value: (
     *    CloseConversationRequest
     *   |SnoozeConversationRequest
     *   |OpenConversationRequest
     *   |AssignConversationRequest
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
     *    'close'
     *   |'snoozed'
     *   |'open'
     *   |'assignment'
     *   |'_unknown'
     * )
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @return (
     *    CloseConversationRequest
     *   |SnoozeConversationRequest
     *   |OpenConversationRequest
     *   |AssignConversationRequest
     *   |mixed
     * )
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param CloseConversationRequest $close
     * @return ManageConversationRequestBody
     */
    public static function close(CloseConversationRequest $close): ManageConversationRequestBody
    {
        return new ManageConversationRequestBody([
            'messageType' => 'close',
            'value' => $close,
        ]);
    }

    /**
     * @param SnoozeConversationRequest $snoozed
     * @return ManageConversationRequestBody
     */
    public static function snoozed(SnoozeConversationRequest $snoozed): ManageConversationRequestBody
    {
        return new ManageConversationRequestBody([
            'messageType' => 'snoozed',
            'value' => $snoozed,
        ]);
    }

    /**
     * @param OpenConversationRequest $open
     * @return ManageConversationRequestBody
     */
    public static function open(OpenConversationRequest $open): ManageConversationRequestBody
    {
        return new ManageConversationRequestBody([
            'messageType' => 'open',
            'value' => $open,
        ]);
    }

    /**
     * @param AssignConversationRequest $assignment
     * @return ManageConversationRequestBody
     */
    public static function assignment(AssignConversationRequest $assignment): ManageConversationRequestBody
    {
        return new ManageConversationRequestBody([
            'messageType' => 'assignment',
            'value' => $assignment,
        ]);
    }

    /**
     * @return bool
     */
    public function isClose(): bool
    {
        return $this->value instanceof CloseConversationRequest && $this->messageType === 'close';
    }

    /**
     * @return CloseConversationRequest
     */
    public function asClose(): CloseConversationRequest
    {
        if (!($this->value instanceof CloseConversationRequest && $this->messageType === 'close')) {
            throw new Exception(
                "Expected close; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSnoozed(): bool
    {
        return $this->value instanceof SnoozeConversationRequest && $this->messageType === 'snoozed';
    }

    /**
     * @return SnoozeConversationRequest
     */
    public function asSnoozed(): SnoozeConversationRequest
    {
        if (!($this->value instanceof SnoozeConversationRequest && $this->messageType === 'snoozed')) {
            throw new Exception(
                "Expected snoozed; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->value instanceof OpenConversationRequest && $this->messageType === 'open';
    }

    /**
     * @return OpenConversationRequest
     */
    public function asOpen(): OpenConversationRequest
    {
        if (!($this->value instanceof OpenConversationRequest && $this->messageType === 'open')) {
            throw new Exception(
                "Expected open; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAssignment(): bool
    {
        return $this->value instanceof AssignConversationRequest && $this->messageType === 'assignment';
    }

    /**
     * @return AssignConversationRequest
     */
    public function asAssignment(): AssignConversationRequest
    {
        if (!($this->value instanceof AssignConversationRequest && $this->messageType === 'assignment')) {
            throw new Exception(
                "Expected assignment; got " . $this->messageType . " with value of type " . get_debug_type($this->value),
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
            case 'close':
                $value = $this->asClose()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'snoozed':
                $value = $this->asSnoozed()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'open':
                $value = $this->asOpen()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'assignment':
                $value = $this->asAssignment()->jsonSerialize();
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
            case 'close':
                $args['value'] = CloseConversationRequest::jsonDeserialize($data);
                break;
            case 'snoozed':
                $args['value'] = SnoozeConversationRequest::jsonDeserialize($data);
                break;
            case 'open':
                $args['value'] = OpenConversationRequest::jsonDeserialize($data);
                break;
            case 'assignment':
                $args['value'] = AssignConversationRequest::jsonDeserialize($data);
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
