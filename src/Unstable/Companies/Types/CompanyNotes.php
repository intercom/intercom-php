<?php

namespace Intercom\Unstable\Companies\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Notes\Types\CompanyNote;
use Intercom\Core\Types\ArrayType;

/**
 * The list of notes associated with the company
 */
class CompanyNotes extends JsonSerializableType
{
    /**
     * @var ?'note.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<CompanyNote> $notes
     */
    #[JsonProperty('notes'), ArrayType([CompanyNote::class])]
    private ?array $notes;

    /**
     * @param array{
     *   type?: ?'note.list',
     *   notes?: ?array<CompanyNote>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->notes = $values['notes'] ?? null;
    }

    /**
     * @return ?'note.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'note.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<CompanyNote>
     */
    public function getNotes(): ?array
    {
        return $this->notes;
    }

    /**
     * @param ?array<CompanyNote> $value
     */
    public function setNotes(?array $value = null): self
    {
        $this->notes = $value;
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
