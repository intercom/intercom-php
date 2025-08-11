<?php

namespace Intercom\Segments\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindSegmentRequest extends JsonSerializableType
{
    /**
     * @var string $segmentId The unique identified of a given segment.
     */
    private string $segmentId;

    /**
     * @param array{
     *   segmentId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->segmentId = $values['segmentId'];
    }

    /**
     * @return string
     */
    public function getSegmentId(): string
    {
        return $this->segmentId;
    }

    /**
     * @param string $value
     */
    public function setSegmentId(string $value): self
    {
        $this->segmentId = $value;
        return $this;
    }
}
