<?php

namespace Intercom\Unstable\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Types\ContactReplyTicketIntercomUserIdRequest;
use Intercom\Unstable\Types\ContactReplyTicketUserIdRequest;
use Intercom\Unstable\Types\ContactReplyTicketEmailRequest;
use Intercom\Unstable\Types\AdminReplyTicketRequest;

class ReplyTicketRequest extends JsonSerializableType
{
    /**
     * @var string $id
     */
    private string $id;

    /**
     * @var (
     *    ContactReplyTicketIntercomUserIdRequest
     *   |ContactReplyTicketUserIdRequest
     *   |ContactReplyTicketEmailRequest
     *   |AdminReplyTicketRequest
     * ) $body
     */
    private ContactReplyTicketIntercomUserIdRequest|ContactReplyTicketUserIdRequest|ContactReplyTicketEmailRequest|AdminReplyTicketRequest $body;

    /**
     * @param array{
     *   id: string,
     *   body: (
     *    ContactReplyTicketIntercomUserIdRequest
     *   |ContactReplyTicketUserIdRequest
     *   |ContactReplyTicketEmailRequest
     *   |AdminReplyTicketRequest
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
     *    ContactReplyTicketIntercomUserIdRequest
     *   |ContactReplyTicketUserIdRequest
     *   |ContactReplyTicketEmailRequest
     *   |AdminReplyTicketRequest
     * )
     */
    public function getBody(): ContactReplyTicketIntercomUserIdRequest|ContactReplyTicketUserIdRequest|ContactReplyTicketEmailRequest|AdminReplyTicketRequest
    {
        return $this->body;
    }

    /**
     * @param (
     *    ContactReplyTicketIntercomUserIdRequest
     *   |ContactReplyTicketUserIdRequest
     *   |ContactReplyTicketEmailRequest
     *   |AdminReplyTicketRequest
     * ) $value
     */
    public function setBody(ContactReplyTicketIntercomUserIdRequest|ContactReplyTicketUserIdRequest|ContactReplyTicketEmailRequest|AdminReplyTicketRequest $value): self
    {
        $this->body = $value;
        return $this;
    }
}
