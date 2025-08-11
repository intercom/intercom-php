<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId id
     */
    private string $contactId;

    /**
     * @param array{
     *   contactId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
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
}
