<?php

namespace Intercom\Unstable\Calls\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ShowCallTranscriptRequest extends JsonSerializableType
{
    /**
     * @var string $id The id of the call
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
