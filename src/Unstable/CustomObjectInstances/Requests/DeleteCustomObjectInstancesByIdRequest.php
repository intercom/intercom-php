<?php

namespace Intercom\Unstable\CustomObjectInstances\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteCustomObjectInstancesByIdRequest extends JsonSerializableType
{
    /**
     * @var string $customObjectTypeIdentifier The unique identifier of the custom object type that defines the structure of the custom object instance.
     */
    private string $customObjectTypeIdentifier;

    /**
     * @var string $externalId
     */
    private string $externalId;

    /**
     * @param array{
     *   customObjectTypeIdentifier: string,
     *   externalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customObjectTypeIdentifier = $values['customObjectTypeIdentifier'];
        $this->externalId = $values['externalId'];
    }

    /**
     * @return string
     */
    public function getCustomObjectTypeIdentifier(): string
    {
        return $this->customObjectTypeIdentifier;
    }

    /**
     * @param string $value
     */
    public function setCustomObjectTypeIdentifier(string $value): self
    {
        $this->customObjectTypeIdentifier = $value;
        return $this;
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
