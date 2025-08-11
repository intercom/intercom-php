<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Contacts\Types\Contact;
use Intercom\Core\Types\ArrayType;

/**
 * Contacts are your users in Intercom.
 */
class ContactList extends JsonSerializableType
{
    /**
     * @var ?'list' $type Always list
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Contact> $data The list of contact objects
     */
    #[JsonProperty('data'), ArrayType([Contact::class])]
    private ?array $data;

    /**
     * @var ?int $totalCount A count of the total number of objects.
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
     *   type?: ?'list',
     *   data?: ?array<Contact>,
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
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Contact>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<Contact> $value
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
