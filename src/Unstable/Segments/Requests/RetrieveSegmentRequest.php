<?php

namespace Intercom\Unstable\Segments\Requests;

use Intercom\Core\Json\JsonSerializableType;

class RetrieveSegmentRequest extends JsonSerializableType
{
    /**
     * @var string $id The unique identified of a given segment.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
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
