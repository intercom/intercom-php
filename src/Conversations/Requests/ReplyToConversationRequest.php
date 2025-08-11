<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\ContactReplyIntercomUserIdRequest;
use Intercom\Types\ContactReplyEmailRequest;
use Intercom\Types\ContactReplyUserIdRequest;
use Intercom\Types\AdminReplyConversationRequest;

class ReplyToConversationRequest extends JsonSerializableType
{
    /**
     * @var string $conversationId The Intercom provisioned identifier for the conversation or the string "last" to reply to the last part of the conversation
     */
    private string $conversationId;

    /**
     * @var (
     *    ContactReplyIntercomUserIdRequest
     *   |ContactReplyEmailRequest
     *   |ContactReplyUserIdRequest
     *   |AdminReplyConversationRequest
     * ) $body
     */
    private ContactReplyIntercomUserIdRequest|ContactReplyEmailRequest|ContactReplyUserIdRequest|AdminReplyConversationRequest $body;

    /**
     * @param array{
     *   conversationId: string,
     *   body: (
     *    ContactReplyIntercomUserIdRequest
     *   |ContactReplyEmailRequest
     *   |ContactReplyUserIdRequest
     *   |AdminReplyConversationRequest
     * ),
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
     * @return (
     *    ContactReplyIntercomUserIdRequest
     *   |ContactReplyEmailRequest
     *   |ContactReplyUserIdRequest
     *   |AdminReplyConversationRequest
     * )
     */
    public function getBody(): ContactReplyIntercomUserIdRequest|ContactReplyEmailRequest|ContactReplyUserIdRequest|AdminReplyConversationRequest
    {
        return $this->body;
    }

    /**
     * @param (
     *    ContactReplyIntercomUserIdRequest
     *   |ContactReplyEmailRequest
     *   |ContactReplyUserIdRequest
     *   |AdminReplyConversationRequest
     * ) $value
     */
    public function setBody(ContactReplyIntercomUserIdRequest|ContactReplyEmailRequest|ContactReplyUserIdRequest|AdminReplyConversationRequest $value): self
    {
        $this->body = $value;
        return $this;
    }
}
