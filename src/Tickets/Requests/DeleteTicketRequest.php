<?php

namespace Intercom\Tickets\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DeleteTicketRequest extends JsonSerializableType
{
    /**
     * @var string $ticketId The unique identifier for the ticket which is given by Intercom.
     */
    private string $ticketId;

    /**
     * @param array{
     *   ticketId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketId = $values['ticketId'];
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
}
