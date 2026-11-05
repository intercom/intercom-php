<?php

namespace Intercom\Unstable\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;

class UpdateDataAttributeBody extends JsonSerializableType
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
        $this->_setField('id');
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
        $this->_setField('body');
        return $this;
    }
}
