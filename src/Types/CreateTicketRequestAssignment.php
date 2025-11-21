<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateTicketRequestAssignment extends JsonSerializableType
{
    /**
     * @var ?string $adminAssigneeId The ID of the admin to which the ticket is assigned. If not provided, the ticket will be unassigned.
     */
    #[JsonProperty('admin_assignee_id')]
    private ?string $adminAssigneeId;

    /**
     * @var ?string $teamAssigneeId The ID of the team to which the ticket is assigned. If not provided, the ticket will be unassigned.
     */
    #[JsonProperty('team_assignee_id')]
    private ?string $teamAssigneeId;

    /**
     * @param array{
     *   adminAssigneeId?: ?string,
     *   teamAssigneeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adminAssigneeId = $values['adminAssigneeId'] ?? null;
        $this->teamAssigneeId = $values['teamAssigneeId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getAdminAssigneeId(): ?string
    {
        return $this->adminAssigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminAssigneeId(?string $value = null): self
    {
        $this->adminAssigneeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamAssigneeId(): ?string
    {
        return $this->teamAssigneeId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamAssigneeId(?string $value = null): self
    {
        $this->teamAssigneeId = $value;
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
