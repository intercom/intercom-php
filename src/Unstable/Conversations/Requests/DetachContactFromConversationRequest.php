<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class DetachContactFromConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The identifier for the conversation as given by Intercom.
     */
    private string $conversationId;

    /**
     * @var string $contactId The identifier for the contact as given by Intercom.
     */
    private string $contactId;

    /**
     * @var string $adminId The `id` of the admin who is performing the action.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @param array{
     *   conversationId: string,
     *   contactId: string,
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->contactId = $values['contactId'];
        $this->adminId = $values['adminId'];
    }

    /**
     * @return string
     */
    public function getConversationId(): string
    {
        return $this->conversationId;
    }

    /**
     * @param string $value
     */
    public function setConversationId(string $value): self
    {
        $this->conversationId = $value;
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

    /**
     * @return string
     */
    public function getAdminId(): string
    {
        return $this->adminId;
    }

    /**
     * @param string $value
     */
    public function setAdminId(string $value): self
    {
        $this->adminId = $value;
        return $this;
    }
}
