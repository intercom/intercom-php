<?php

namespace Intercom\Tags\Requests;

use Intercom\Core\Json\JsonSerializableType;

class UntagContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
     */
    private string $contactId;

    /**
     * @var string $tagId The unique identifier for the tag which is given by Intercom
     */
    private string $tagId;

    /**
     * @param array{
     *   contactId: string,
     *   tagId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->tagId = $values['tagId'];
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
    public function getTagId(): string
    {
        return $this->tagId;
    }

    /**
     * @param string $value
     */
    public function setTagId(string $value): self
    {
        $this->tagId = $value;
        return $this;
    }
}
