<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Conversations\Types\ConversationsManageRequestBody;

class ManageConversationPartsRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The identifier for the conversation as given by Intercom.
     */
    private string $conversationId;

    /**
     * @var ConversationsManageRequestBody $body
     */
    private ConversationsManageRequestBody $body;

    /**
     * @param array{
     *   conversationId: string,
     *   body: ConversationsManageRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->body = $values['body'];
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
     * @return ConversationsManageRequestBody
     */
    public function getBody(): ConversationsManageRequestBody
    {
        return $this->body;
    }

    /**
     * @param ConversationsManageRequestBody $value
     */
    public function setBody(ConversationsManageRequestBody $value): self
    {
        $this->body = $value;
        return $this;
    }
}
