<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The sender of the message. If not provided, the default sender will be used.
 */
class CreateMessageRequestFrom extends JsonSerializableType
{
    /**
     * @var 'admin' $type Always `admin`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $id The identifier for the admin which is given by Intercom.
     */
    #[JsonProperty('id')]
    private int $id;

    /**
     * @param array{
     *   type: 'admin',
     *   id: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
    }

    /**
     * @return 'admin'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'admin' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
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
