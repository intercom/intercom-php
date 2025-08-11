<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The sender of the message. If not provided, the default sender will be used.
 */
class CreateMessageRequestTo extends JsonSerializableType
{
    /**
     * @var value-of<CreateMessageRequestType> $type The role associated to the contact - `user` or `lead`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The identifier for the contact which is given by Intercom.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @param array{
     *   type: value-of<CreateMessageRequestType>,
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
    }

    /**
     * @return value-of<CreateMessageRequestType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<CreateMessageRequestType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
