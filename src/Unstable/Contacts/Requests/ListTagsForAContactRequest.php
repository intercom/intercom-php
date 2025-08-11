<?php

namespace Intercom\Unstable\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ListTagsForAContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
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
