<?php

namespace Intercom\Notes\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindNoteRequest extends JsonSerializableType
{
    /**
     * @var int $noteId The unique identifier of a given note
     */
    private int $noteId;

    /**
     * @param array{
     *   noteId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->noteId = $values['noteId'];
    }

    /**
     * @return int
     */
    public function getNoteId(): int
    {
        return $this->noteId;
    }

    /**
     * @param int $value
     */
    public function setNoteId(int $value): self
    {
        $this->noteId = $value;
        return $this;
    }
}
