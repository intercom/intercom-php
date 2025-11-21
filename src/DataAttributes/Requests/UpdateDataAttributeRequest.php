<?php

namespace Intercom\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\UpdateDataAttributeRequestOptions;

class UpdateDataAttributeRequest extends JsonSerializableType
{
    /**
     * @var int $dataAttributeId The data attribute id
     */
    private int $dataAttributeId;

    /**
     * @var (
     *    UpdateDataAttributeRequestOptions
     *   |mixed
     * ) $body
     */
    private mixed $body;

    /**
     * @param array{
     *   dataAttributeId: int,
     *   body: (
     *    UpdateDataAttributeRequestOptions
     *   |mixed
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dataAttributeId = $values['dataAttributeId'];
        $this->body = $values['body'];
    }

    /**
     * @return int
     */
    public function getDataAttributeId(): int
    {
        return $this->dataAttributeId;
    }

    /**
     * @param int $value
     */
    public function setDataAttributeId(int $value): self
    {
        $this->dataAttributeId = $value;
        return $this;
    }

    /**
     * @return (
     *    UpdateDataAttributeRequestOptions
     *   |mixed
     * )
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * @param (
     *    UpdateDataAttributeRequestOptions
     *   |mixed
     * ) $value
     */
    public function setBody(mixed $value): self
    {
        $this->body = $value;
        return $this;
    }
}
