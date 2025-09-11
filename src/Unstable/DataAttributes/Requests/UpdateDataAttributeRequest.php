<?php

namespace Intercom\Unstable\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;

class UpdateDataAttributeRequest extends JsonSerializableType
{
    /**
     * @var int $id The data attribute id
     */
    private int $id;

    /**
     * @var mixed $body
     */
    private mixed $body;

    /**
     * @param array{
     *   id: int,
     *   body: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->body = $values['body'];
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
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * @param mixed $value
     */
    public function setBody(mixed $value): self
    {
        $this->body = $value;
        return $this;
    }
}
