<?php

namespace Intercom\Unstable\Tags\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachTagToTicketRequest extends JsonSerializableType
{
    /**
     * @var string $ticketId ticket_id
     */
    private string $ticketId;

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
     *   ticketId: string,
     *   id: string,
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ticketId = $values['ticketId'];
        $this->id = $values['id'];
        $this->adminId = $values['adminId'];
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
