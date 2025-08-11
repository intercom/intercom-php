<?php

namespace Intercom\Unstable\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ShowContactByExternalIdRequest extends JsonSerializableType
{
    /**
     * @var string $externalId The external ID of the user that you want to retrieve
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
