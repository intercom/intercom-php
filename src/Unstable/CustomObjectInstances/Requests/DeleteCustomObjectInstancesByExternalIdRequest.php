<?php

namespace Intercom\Unstable\CustomObjectInstances\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteCustomObjectInstancesByExternalIdRequest extends JsonSerializableType
{
    /**
     * @var string $customObjectTypeIdentifier The unique identifier of the custom object type that defines the structure of the custom object instance.
     */
    private string $customObjectTypeIdentifier;

    /**
     * @var string $id The Intercom defined id of the custom object instance
     */
    private string $id;

    /**
     * @param array{
     *   customObjectTypeIdentifier: string,
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customObjectTypeIdentifier = $values['customObjectTypeIdentifier'];
        $this->id = $values['id'];
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
}
