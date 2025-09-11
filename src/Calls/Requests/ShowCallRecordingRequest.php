<?php

namespace Intercom\Calls\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ShowCallRecordingRequest extends JsonSerializableType
{
    /**
     * @var string $callId The id of the call
     */
    private string $callId;

    /**
     * @param array{
     *   callId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
    }

    /**
     * @return string
     */
    public function getCallId(): string
    {
        return $this->callId;
    }

    /**
     * @param string $value
     */
    public function setCallId(string $value): self
    {
        $this->callId = $value;
        return $this;
    }
}
