<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A Statistics object containing all information required for reporting, with timestamps and calculated metrics.
 */
class ConversationStatistics extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?int $timeToAssignment Duration until last assignment before first admin reply. In seconds.
     */
    #[JsonProperty('time_to_assignment')]
    private ?int $timeToAssignment;

    /**
     * @var ?int $timeToAdminReply Duration until first admin reply. Subtracts out of business hours. In seconds.
     */
    #[JsonProperty('time_to_admin_reply')]
    private ?int $timeToAdminReply;

    /**
     * @var ?int $timeToFirstClose Duration until conversation was closed first time. Subtracts out of business hours. In seconds.
     */
    #[JsonProperty('time_to_first_close')]
    private ?int $timeToFirstClose;

    /**
     * @var ?int $timeToLastClose Duration until conversation was closed last time. Subtracts out of business hours. In seconds.
     */
    #[JsonProperty('time_to_last_close')]
    private ?int $timeToLastClose;

    /**
     * @var ?int $medianTimeToReply Median based on all admin replies after a contact reply. Subtracts out of business hours. In seconds.
     */
    #[JsonProperty('median_time_to_reply')]
    private ?int $medianTimeToReply;

    /**
     * @var ?int $firstContactReplyAt Time of first text conversation part from a contact.
     */
    #[JsonProperty('first_contact_reply_at')]
    private ?int $firstContactReplyAt;

    /**
     * @var ?int $firstAssignmentAt Time of first assignment after first_contact_reply_at.
     */
    #[JsonProperty('first_assignment_at')]
    private ?int $firstAssignmentAt;

    /**
     * @var ?int $firstAdminReplyAt Time of first admin reply after first_contact_reply_at.
     */
    #[JsonProperty('first_admin_reply_at')]
    private ?int $firstAdminReplyAt;

    /**
     * @var ?int $firstCloseAt Time of first close after first_contact_reply_at.
     */
    #[JsonProperty('first_close_at')]
    private ?int $firstCloseAt;

    /**
     * @var ?int $lastAssignmentAt Time of last assignment after first_contact_reply_at.
     */
    #[JsonProperty('last_assignment_at')]
    private ?int $lastAssignmentAt;

    /**
     * @var ?int $lastAssignmentAdminReplyAt Time of first admin reply since most recent assignment.
     */
    #[JsonProperty('last_assignment_admin_reply_at')]
    private ?int $lastAssignmentAdminReplyAt;

    /**
     * @var ?int $lastContactReplyAt Time of the last conversation part from a contact.
     */
    #[JsonProperty('last_contact_reply_at')]
    private ?int $lastContactReplyAt;

    /**
     * @var ?int $lastAdminReplyAt Time of the last conversation part from an admin.
     */
    #[JsonProperty('last_admin_reply_at')]
    private ?int $lastAdminReplyAt;

    /**
     * @var ?int $lastCloseAt Time of the last conversation close.
     */
    #[JsonProperty('last_close_at')]
    private ?int $lastCloseAt;

    /**
     * @var ?string $lastClosedById The last admin who closed the conversation. Returns a reference to an Admin object.
     */
    #[JsonProperty('last_closed_by_id')]
    private ?string $lastClosedById;

    /**
     * @var ?int $countReopens Number of reopens after first_contact_reply_at.
     */
    #[JsonProperty('count_reopens')]
    private ?int $countReopens;

    /**
     * @var ?int $countAssignments Number of assignments after first_contact_reply_at.
     */
    #[JsonProperty('count_assignments')]
    private ?int $countAssignments;

    /**
     * @var ?int $countConversationParts Total number of conversation parts.
     */
    #[JsonProperty('count_conversation_parts')]
    private ?int $countConversationParts;

    /**
     * @var ?array<ConversationResponseTime> $assignedTeamFirstResponseTimeByTeam An array of conversation response time objects
     */
    #[JsonProperty('assigned_team_first_response_time_by_team'), ArrayType([ConversationResponseTime::class])]
    private ?array $assignedTeamFirstResponseTimeByTeam;

    /**
     * @var ?array<ConversationResponseTime> $assignedTeamFirstResponseTimeInOfficeHours An array of conversation response time objects within office hours
     */
    #[JsonProperty('assigned_team_first_response_time_in_office_hours'), ArrayType([ConversationResponseTime::class])]
    private ?array $assignedTeamFirstResponseTimeInOfficeHours;

    /**
     * @var ?int $handlingTime Time from conversation assignment to conversation close in seconds.
     */
    #[JsonProperty('handling_time')]
    private ?int $handlingTime;

    /**
     * @param array{
     *   type?: ?string,
     *   timeToAssignment?: ?int,
     *   timeToAdminReply?: ?int,
     *   timeToFirstClose?: ?int,
     *   timeToLastClose?: ?int,
     *   medianTimeToReply?: ?int,
     *   firstContactReplyAt?: ?int,
     *   firstAssignmentAt?: ?int,
     *   firstAdminReplyAt?: ?int,
     *   firstCloseAt?: ?int,
     *   lastAssignmentAt?: ?int,
     *   lastAssignmentAdminReplyAt?: ?int,
     *   lastContactReplyAt?: ?int,
     *   lastAdminReplyAt?: ?int,
     *   lastCloseAt?: ?int,
     *   lastClosedById?: ?string,
     *   countReopens?: ?int,
     *   countAssignments?: ?int,
     *   countConversationParts?: ?int,
     *   assignedTeamFirstResponseTimeByTeam?: ?array<ConversationResponseTime>,
     *   assignedTeamFirstResponseTimeInOfficeHours?: ?array<ConversationResponseTime>,
     *   handlingTime?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->timeToAssignment = $values['timeToAssignment'] ?? null;
        $this->timeToAdminReply = $values['timeToAdminReply'] ?? null;
        $this->timeToFirstClose = $values['timeToFirstClose'] ?? null;
        $this->timeToLastClose = $values['timeToLastClose'] ?? null;
        $this->medianTimeToReply = $values['medianTimeToReply'] ?? null;
        $this->firstContactReplyAt = $values['firstContactReplyAt'] ?? null;
        $this->firstAssignmentAt = $values['firstAssignmentAt'] ?? null;
        $this->firstAdminReplyAt = $values['firstAdminReplyAt'] ?? null;
        $this->firstCloseAt = $values['firstCloseAt'] ?? null;
        $this->lastAssignmentAt = $values['lastAssignmentAt'] ?? null;
        $this->lastAssignmentAdminReplyAt = $values['lastAssignmentAdminReplyAt'] ?? null;
        $this->lastContactReplyAt = $values['lastContactReplyAt'] ?? null;
        $this->lastAdminReplyAt = $values['lastAdminReplyAt'] ?? null;
        $this->lastCloseAt = $values['lastCloseAt'] ?? null;
        $this->lastClosedById = $values['lastClosedById'] ?? null;
        $this->countReopens = $values['countReopens'] ?? null;
        $this->countAssignments = $values['countAssignments'] ?? null;
        $this->countConversationParts = $values['countConversationParts'] ?? null;
        $this->assignedTeamFirstResponseTimeByTeam = $values['assignedTeamFirstResponseTimeByTeam'] ?? null;
        $this->assignedTeamFirstResponseTimeInOfficeHours = $values['assignedTeamFirstResponseTimeInOfficeHours'] ?? null;
        $this->handlingTime = $values['handlingTime'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTimeToAssignment(): ?int
    {
        return $this->timeToAssignment;
    }

    /**
     * @param ?int $value
     */
    public function setTimeToAssignment(?int $value = null): self
    {
        $this->timeToAssignment = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTimeToAdminReply(): ?int
    {
        return $this->timeToAdminReply;
    }

    /**
     * @param ?int $value
     */
    public function setTimeToAdminReply(?int $value = null): self
    {
        $this->timeToAdminReply = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTimeToFirstClose(): ?int
    {
        return $this->timeToFirstClose;
    }

    /**
     * @param ?int $value
     */
    public function setTimeToFirstClose(?int $value = null): self
    {
        $this->timeToFirstClose = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTimeToLastClose(): ?int
    {
        return $this->timeToLastClose;
    }

    /**
     * @param ?int $value
     */
    public function setTimeToLastClose(?int $value = null): self
    {
        $this->timeToLastClose = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMedianTimeToReply(): ?int
    {
        return $this->medianTimeToReply;
    }

    /**
     * @param ?int $value
     */
    public function setMedianTimeToReply(?int $value = null): self
    {
        $this->medianTimeToReply = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstContactReplyAt(): ?int
    {
        return $this->firstContactReplyAt;
    }

    /**
     * @param ?int $value
     */
    public function setFirstContactReplyAt(?int $value = null): self
    {
        $this->firstContactReplyAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstAssignmentAt(): ?int
    {
        return $this->firstAssignmentAt;
    }

    /**
     * @param ?int $value
     */
    public function setFirstAssignmentAt(?int $value = null): self
    {
        $this->firstAssignmentAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstAdminReplyAt(): ?int
    {
        return $this->firstAdminReplyAt;
    }

    /**
     * @param ?int $value
     */
    public function setFirstAdminReplyAt(?int $value = null): self
    {
        $this->firstAdminReplyAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getFirstCloseAt(): ?int
    {
        return $this->firstCloseAt;
    }

    /**
     * @param ?int $value
     */
    public function setFirstCloseAt(?int $value = null): self
    {
        $this->firstCloseAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastAssignmentAt(): ?int
    {
        return $this->lastAssignmentAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastAssignmentAt(?int $value = null): self
    {
        $this->lastAssignmentAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastAssignmentAdminReplyAt(): ?int
    {
        return $this->lastAssignmentAdminReplyAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastAssignmentAdminReplyAt(?int $value = null): self
    {
        $this->lastAssignmentAdminReplyAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastContactReplyAt(): ?int
    {
        return $this->lastContactReplyAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastContactReplyAt(?int $value = null): self
    {
        $this->lastContactReplyAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastAdminReplyAt(): ?int
    {
        return $this->lastAdminReplyAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastAdminReplyAt(?int $value = null): self
    {
        $this->lastAdminReplyAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastCloseAt(): ?int
    {
        return $this->lastCloseAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastCloseAt(?int $value = null): self
    {
        $this->lastCloseAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLastClosedById(): ?string
    {
        return $this->lastClosedById;
    }

    /**
     * @param ?string $value
     */
    public function setLastClosedById(?string $value = null): self
    {
        $this->lastClosedById = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCountReopens(): ?int
    {
        return $this->countReopens;
    }

    /**
     * @param ?int $value
     */
    public function setCountReopens(?int $value = null): self
    {
        $this->countReopens = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCountAssignments(): ?int
    {
        return $this->countAssignments;
    }

    /**
     * @param ?int $value
     */
    public function setCountAssignments(?int $value = null): self
    {
        $this->countAssignments = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCountConversationParts(): ?int
    {
        return $this->countConversationParts;
    }

    /**
     * @param ?int $value
     */
    public function setCountConversationParts(?int $value = null): self
    {
        $this->countConversationParts = $value;
        return $this;
    }

    /**
     * @return ?array<ConversationResponseTime>
     */
    public function getAssignedTeamFirstResponseTimeByTeam(): ?array
    {
        return $this->assignedTeamFirstResponseTimeByTeam;
    }

    /**
     * @param ?array<ConversationResponseTime> $value
     */
    public function setAssignedTeamFirstResponseTimeByTeam(?array $value = null): self
    {
        $this->assignedTeamFirstResponseTimeByTeam = $value;
        return $this;
    }

    /**
     * @return ?array<ConversationResponseTime>
     */
    public function getAssignedTeamFirstResponseTimeInOfficeHours(): ?array
    {
        return $this->assignedTeamFirstResponseTimeInOfficeHours;
    }

    /**
     * @param ?array<ConversationResponseTime> $value
     */
    public function setAssignedTeamFirstResponseTimeInOfficeHours(?array $value = null): self
    {
        $this->assignedTeamFirstResponseTimeInOfficeHours = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getHandlingTime(): ?int
    {
        return $this->handlingTime;
    }

    /**
     * @param ?int $value
     */
    public function setHandlingTime(?int $value = null): self
    {
        $this->handlingTime = $value;
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
