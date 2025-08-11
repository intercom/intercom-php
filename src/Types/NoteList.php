<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Notes\Types\Note;
use Intercom\Core\Types\ArrayType;

/**
 * A paginated list of notes associated with a contact.
 */
class NoteList extends JsonSerializableType
{
    /**
     * @var 'list' $type String representing the object's type. Always has the value `list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<Note> $data An array of notes.
     */
    #[JsonProperty('data'), ArrayType([Note::class])]
    private array $data;

    /**
     * @var int $totalCount A count of the total number of notes.
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @param array{
     *   type: 'list',
     *   data: array<Note>,
     *   totalCount: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->data = $values['data'];
        $this->totalCount = $values['totalCount'];
    }

    /**
     * @return 'list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<Note>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array<Note> $value
     */
    public function setData(array $value): self
    {
        $this->data = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $value
     */
    public function setTotalCount(int $value): self
    {
        $this->totalCount = $value;
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
