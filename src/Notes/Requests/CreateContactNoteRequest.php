<?php

namespace Intercom\Notes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateContactNoteRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier of a given contact.
     */
    private string $contactId;

    /**
     * @var string $body The text of the note.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var ?string $adminId The unique identifier of a given admin.
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @param array{
     *   contactId: string,
     *   body: string,
     *   adminId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->body = $values['body'];
        $this->adminId = $values['adminId'] ?? null;
    }

    /**
     * @return string
     */
    public function getContactId(): string
    {
        return $this->contactId;
    }

    /**
     * @param string $value
     */
    public function setContactId(string $value): self
    {
        $this->contactId = $value;
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
