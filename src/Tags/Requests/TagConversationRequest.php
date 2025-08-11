<?php

namespace Intercom\Tags\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class TagConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId conversation_id
     */
    private string $conversationId;

    /**
     * @var string $tagId The unique identifier for the tag which is given by Intercom
     */
    #[JsonProperty('id')]
    private string $tagId;

    /**
     * @var string $adminId The unique identifier for the admin which is given by Intercom.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @param array{
     *   conversationId: string,
     *   tagId: string,
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->tagId = $values['tagId'];
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
