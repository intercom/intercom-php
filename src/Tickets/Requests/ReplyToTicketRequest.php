<?php

namespace Intercom\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Types\ContactReplyTicketIntercomUserIdRequest;
use Intercom\Types\ContactReplyTicketUserIdRequest;
use Intercom\Types\ContactReplyTicketEmailRequest;
use Intercom\Types\AdminReplyTicketRequest;

class ReplyToTicketRequest extends JsonSerializableType
{
    /**
     * @var string $ticketId
     */
    private string $ticketId;

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
     *   ticketId: string,
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
        $this->ticketId = $values['ticketId'];
        $this->body = $values['body'];
    }

    /**
     * @return string
     */
    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    /**
     * @param string $value
     */
    public function setTicketId(string $value): self
    {
        $this->ticketId = $value;
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
