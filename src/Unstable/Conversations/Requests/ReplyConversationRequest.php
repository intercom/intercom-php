<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Types\ContactReplyIntercomUserIdRequest;
use Intercom\Unstable\Types\ContactReplyEmailRequest;
use Intercom\Unstable\Types\ContactReplyUserIdRequest;
use Intercom\Unstable\Types\AdminReplyConversationRequest;

class ReplyConversationRequest extends JsonSerializableType
{
    /**
     * @var string $id The Intercom provisioned identifier for the conversation or the string "last" to reply to the last part of the conversation
     */
    private string $id;

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
     *   id: string,
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
        $this->id = $values['id'];
        $this->body = $values['body'];
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
