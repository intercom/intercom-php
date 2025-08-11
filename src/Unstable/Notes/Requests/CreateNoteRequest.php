<?php

namespace Intercom\Unstable\Notes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateNoteRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier of a given contact.
     */
    private int $id;

    /**
     * @var string $body The text of the note.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?string $contactId The unique identifier of a given contact.
     */
    #[JsonProperty('contact_id')]
    private ?string $contactId;

    /**
     * @var ?string $adminId The unique identifier of a given admin.
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @param array{
     *   id: int,
     *   body: string,
     *   contactId?: ?string,
     *   adminId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->body = $values['body'];
        $this->contactId = $values['contactId'] ?? null;
        $this->adminId = $values['adminId'] ?? null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
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
     * @return ?string
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    /**
     * @param ?string $value
     */
    public function setContactId(?string $value = null): self
    {
        $this->contactId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminId(?string $value = null): self
    {
        $this->adminId = $value;
        return $this;
    }
}
