<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class UpdateTicketRequestAssignment extends JsonSerializableType
{
    /**
     * @var ?string $adminId The ID of the admin performing the action.
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @var ?string $assigneeId The ID of the admin or team to which the ticket is assigned. Set this 0 to unassign it.
     */
    #[JsonProperty('assignee_id')]
    private ?string $assigneeId;

    /**
     * @param array{
     *   adminId?: ?string,
     *   assigneeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adminId = $values['adminId'] ?? null;
        $this->assigneeId = $values['assigneeId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminId(?string $value = null): self
    {
        $this->adminId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAssigneeId(): ?string
    {
        return $this->assigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setAssigneeId(?string $value = null): self
    {
        $this->assigneeId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
