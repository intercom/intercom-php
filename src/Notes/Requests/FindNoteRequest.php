<?php

namespace Intercom\Notes\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindNoteRequest extends JsonSerializableType
{
    /**
     * @var string $noteId The unique identifier of a given note
     */
    private string $noteId;

    /**
     * @param array{
     *   noteId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->noteId = $values['noteId'];
    }

    /**
     * @return string
     */
    public function getNoteId(): string
    {
        return $this->noteId;
    }

    /**
     * @param string $value
     */
    public function setNoteId(string $value): self
    {
        $this->noteId = $value;
        return $this;
    }
}
