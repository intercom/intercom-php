<?php

namespace Intercom\Unstable\Calls\Requests;

use Intercom\Core\Json\JsonSerializableType;

class CollectFinVoiceCallByExternalIdRequest extends JsonSerializableType
{
    /**
     * @var string $externalId The external call identifier from the call provider
     */
    private string $externalId;

    /**
     * @param array{
     *   externalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $value
     */
    public function setExternalId(string $value): self
    {
        $this->externalId = $value;
        return $this;
    }
}
