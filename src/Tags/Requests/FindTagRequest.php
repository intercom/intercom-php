<?php

namespace Intercom\Tags\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindTagRequest extends JsonSerializableType
{
    /**
     * @var string $tagId The unique identifier of a given tag
     */
    private string $tagId;

    /**
     * @param array{
     *   tagId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tagId = $values['tagId'];
    }

    /**
     * @return string
     */
    public function getTagId(): string
    {
        return $this->tagId;
    }

    /**
     * @param string $value
     */
    public function setTagId(string $value): self
    {
        $this->tagId = $value;
        return $this;
    }
}
