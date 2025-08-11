<?php

namespace Intercom\TicketTypes\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindTicketTypeRequest extends JsonSerializableType
{
    /**
     * @var string $ticketTypeId The unique identifier for the ticket type which is given by Intercom.
     */
    private string $ticketTypeId;

    /**
     * @param array{
     *   ticketTypeId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketTypeId = $values['ticketTypeId'];
    }

    /**
     * @return string
     */
    public function getTicketTypeId(): string
    {
        return $this->ticketTypeId;
    }

    /**
     * @param string $value
     */
    public function setTicketTypeId(string $value): self
    {
        $this->ticketTypeId = $value;
        return $this;
    }
}
