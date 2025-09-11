<?php

namespace Intercom\CustomObjectInstances\Requests;

use Intercom\Core\Json\JsonSerializableType;

class GetCustomObjectInstancesByIdRequest extends JsonSerializableType
{
    /**
     * @var string $customObjectTypeIdentifier The unique identifier of the custom object type that defines the structure of the custom object instance.
     */
    private string $customObjectTypeIdentifier;

    /**
     * @var string $customObjectInstanceId The id or external_id of the custom object instance
     */
    private string $customObjectInstanceId;

    /**
     * @param array{
     *   customObjectTypeIdentifier: string,
     *   customObjectInstanceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customObjectTypeIdentifier = $values['customObjectTypeIdentifier'];
        $this->customObjectInstanceId = $values['customObjectInstanceId'];
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
    public function getCustomObjectInstanceId(): string
    {
        return $this->customObjectInstanceId;
    }

    /**
     * @param string $value
     */
    public function setCustomObjectInstanceId(string $value): self
    {
        $this->customObjectInstanceId = $value;
        return $this;
    }
}
