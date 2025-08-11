<?php

namespace Intercom\Unstable\Tags\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachTagToConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId conversation_id
     */
    private string $conversationId;

    /**
     * @var string $id The unique identifier for the tag which is given by Intercom
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $adminId The unique identifier for the admin which is given by Intercom.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @param array{
     *   conversationId: string,
     *   id: string,
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->id = $values['id'];
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
