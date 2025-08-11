<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Notes\Types\Note;
use Intercom\Core\Types\ArrayType;

/**
 * A paginated list of notes associated with a contact.
 */
class NoteList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Note> $data An array of notes.
     */
    #[JsonProperty('data'), ArrayType([Note::class])]
    private ?array $data;

    /**
     * @var ?int $totalCount A count of the total number of notes.
     */
    #[JsonProperty('total_count')]
    private ?int $totalCount;

    /**
     * @var ?CursorPages $pages
     */
    #[JsonProperty('pages')]
    private ?CursorPages $pages;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<Note>,
     *   totalCount?: ?int,
     *   pages?: ?CursorPages,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->totalCount = $values['totalCount'] ?? null;
        $this->pages = $values['pages'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Note>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Note> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param ?int $value
     */
    public function setTotalCount(?int $value = null): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return ?CursorPages
     */
    public function getPages(): ?CursorPages
    {
        return $this->pages;
    }

    /**
     * @param ?CursorPages $value
     */
    public function setPages(?CursorPages $value = null): self
    {
        $this->pages = $value;
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
