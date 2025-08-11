<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class MergeContactsRequest extends JsonSerializableType
{
    /**
     * @var string $leadId The unique identifier for the contact to merge away from. Must be a lead.
     */
    #[JsonProperty('from')]
    private string $leadId;

    /**
     * @var string $contactId The unique identifier for the contact to merge into. Must be a user.
     */
    #[JsonProperty('into')]
    private string $contactId;

    /**
     * @param array{
     *   leadId: string,
     *   contactId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->leadId = $values['leadId'];
        $this->contactId = $values['contactId'];
    }

    /**
     * @return string
     */
    public function getLeadId(): string
    {
        return $this->leadId;
    }

    /**
     * @param string $value
     */
    public function setLeadId(string $value): self
    {
        $this->leadId = $value;
        return $this;
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
