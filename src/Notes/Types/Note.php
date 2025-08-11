<?php

namespace Intercom\Notes\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;

/**
 * Notes allow you to annotate and comment on your contacts.
 */
class Note extends JsonSerializableType
{
    /**
     * @var 'note' $type String representing the object's type. Always has the value `note`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id of the note.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var int $createdAt The time the note was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?NoteContact $contact Represents the contact that the note was created about.
     */
    #[JsonProperty('contact')]
    private ?NoteContact $contact;

    /**
     * @var Admin $author Optional. Represents the Admin that created the note.
     */
    #[JsonProperty('author')]
    private Admin $author;

    /**
     * @var string $body The body text of the note.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @param array{
     *   type: 'note',
     *   id: string,
     *   createdAt: int,
     *   author: Admin,
     *   body: string,
     *   contact?: ?NoteContact,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->contact = $values['contact'] ?? null;
        $this->author = $values['author'];
        $this->body = $values['body'];
    }

    /**
     * @return 'note'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'note' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
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

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?NoteContact
     */
    public function getContact(): ?NoteContact
    {
        return $this->contact;
    }

    /**
     * @param ?NoteContact $value
     */
    public function setContact(?NoteContact $value = null): self
    {
        $this->contact = $value;
        return $this;
    }

    /**
     * @return Admin
     */
    public function getAuthor(): Admin
    {
        return $this->author;
    }

    /**
     * @param Admin $value
     */
    public function setAuthor(Admin $value): self
    {
        $this->author = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
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
