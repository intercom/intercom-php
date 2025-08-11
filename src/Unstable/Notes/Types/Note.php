<?php

namespace Intercom\Unstable\Notes\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Admins\Types\Admin;

/**
 * Notes allow you to annotate and comment on your contacts.
 */
class Note extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `note`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the note.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $createdAt The time the note was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?NoteContact $contact Represents the contact that the note was created about.
     */
    #[JsonProperty('contact')]
    private ?NoteContact $contact;

    /**
     * @var ?Admin $author Optional. Represents the Admin that created the note.
     */
    #[JsonProperty('author')]
    private ?Admin $author;

    /**
     * @var ?string $body The body text of the note.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   createdAt?: ?int,
     *   contact?: ?NoteContact,
     *   author?: ?Admin,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->contact = $values['contact'] ?? null;
        $this->author = $values['author'] ?? null;
        $this->body = $values['body'] ?? null;
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
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
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
     * @return ?Admin
     */
    public function getAuthor(): ?Admin
    {
        return $this->author;
    }

    /**
     * @param ?Admin $value
     */
    public function setAuthor(?Admin $value = null): self
    {
        $this->author = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
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
