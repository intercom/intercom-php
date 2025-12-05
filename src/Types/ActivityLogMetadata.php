<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Date;
use Intercom\Core\Types\ArrayType;

/**
 * Additional data provided about Admin activity.
 */
class ActivityLogMetadata extends JsonSerializableType
{
    /**
     * @var ?string $signInMethod The way the admin signed in.
     */
    #[JsonProperty('sign_in_method')]
    private ?string $signInMethod;

    /**
     * @var ?string $externalId The unique identifier for the contact which is provided by the Client.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var ?bool $awayMode The away mode status which is set to true when away and false when returned.
     */
    #[JsonProperty('away_mode')]
    private ?bool $awayMode;

    /**
     * @var ?string $awayStatusReason The reason the Admin is away.
     */
    #[JsonProperty('away_status_reason')]
    private ?string $awayStatusReason;

    /**
     * @var ?bool $reassignConversations Indicates if conversations should be reassigned while an Admin is away.
     */
    #[JsonProperty('reassign_conversations')]
    private ?bool $reassignConversations;

    /**
     * @var ?string $source The action that initiated the status change.
     */
    #[JsonProperty('source')]
    private ?string $source;

    /**
     * @var ?string $autoChanged Indicates if the status was changed automatically or manually.
     */
    #[JsonProperty('auto_changed')]
    private ?string $autoChanged;

    /**
     * @var ?int $updateBy The ID of the Admin who initiated the activity.
     */
    #[JsonProperty('update_by')]
    private ?int $updateBy;

    /**
     * @var ?string $updateByName The name of the Admin who initiated the activity.
     */
    #[JsonProperty('update_by_name')]
    private ?string $updateByName;

    /**
     * @var ?int $conversationAssignmentLimit The conversation assignment limit value for an admin.
     */
    #[JsonProperty('conversation_assignment_limit')]
    private ?int $conversationAssignmentLimit;

    /**
     * @var ?int $ticketAssignmentLimit The ticket assignment limit value for an admin.
     */
    #[JsonProperty('ticket_assignment_limit')]
    private ?int $ticketAssignmentLimit;

    /**
     * @var ?ActivityLogMetadataTeam $team Details about the team whose assignment limit was changed.
     */
    #[JsonProperty('team')]
    private ?ActivityLogMetadataTeam $team;

    /**
     * @var ?int $teamAssignmentLimit The team assignment limit value (null if limit was removed).
     */
    #[JsonProperty('team_assignment_limit')]
    private ?int $teamAssignmentLimit;

    /**
     * @var ?bool $enabled Indicates if the setting is enabled or disabled.
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * @var ?int $consentId The ID of the impersonation consent.
     */
    #[JsonProperty('consent_id')]
    private ?int $consentId;

    /**
     * @var ?DateTime $expiredAt The timestamp when the impersonation consent expires.
     */
    #[JsonProperty('expired_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $expiredAt;

    /**
     * @var ?array<string, mixed> $before The state of settings or values before the change. Structure varies by activity type.
     */
    #[JsonProperty('before'), ArrayType(['string' => 'mixed'])]
    private ?array $before;

    /**
     * @var ?array<string, mixed> $after The state of settings or values after the change. Structure varies by activity type.
     */
    #[JsonProperty('after'), ArrayType(['string' => 'mixed'])]
    private ?array $after;

    /**
     * @param array{
     *   signInMethod?: ?string,
     *   externalId?: ?string,
     *   awayMode?: ?bool,
     *   awayStatusReason?: ?string,
     *   reassignConversations?: ?bool,
     *   source?: ?string,
     *   autoChanged?: ?string,
     *   updateBy?: ?int,
     *   updateByName?: ?string,
     *   conversationAssignmentLimit?: ?int,
     *   ticketAssignmentLimit?: ?int,
     *   team?: ?ActivityLogMetadataTeam,
     *   teamAssignmentLimit?: ?int,
     *   enabled?: ?bool,
     *   consentId?: ?int,
     *   expiredAt?: ?DateTime,
     *   before?: ?array<string, mixed>,
     *   after?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->signInMethod = $values['signInMethod'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->awayMode = $values['awayMode'] ?? null;
        $this->awayStatusReason = $values['awayStatusReason'] ?? null;
        $this->reassignConversations = $values['reassignConversations'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->autoChanged = $values['autoChanged'] ?? null;
        $this->updateBy = $values['updateBy'] ?? null;
        $this->updateByName = $values['updateByName'] ?? null;
        $this->conversationAssignmentLimit = $values['conversationAssignmentLimit'] ?? null;
        $this->ticketAssignmentLimit = $values['ticketAssignmentLimit'] ?? null;
        $this->team = $values['team'] ?? null;
        $this->teamAssignmentLimit = $values['teamAssignmentLimit'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->consentId = $values['consentId'] ?? null;
        $this->expiredAt = $values['expiredAt'] ?? null;
        $this->before = $values['before'] ?? null;
        $this->after = $values['after'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSignInMethod(): ?string
    {
        return $this->signInMethod;
    }

    /**
     * @param ?string $value
     */
    public function setSignInMethod(?string $value = null): self
    {
        $this->signInMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAwayMode(): ?bool
    {
        return $this->awayMode;
    }

    /**
     * @param ?bool $value
     */
    public function setAwayMode(?bool $value = null): self
    {
        $this->awayMode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAwayStatusReason(): ?string
    {
        return $this->awayStatusReason;
    }

    /**
     * @param ?string $value
     */
    public function setAwayStatusReason(?string $value = null): self
    {
        $this->awayStatusReason = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getReassignConversations(): ?bool
    {
        return $this->reassignConversations;
    }

    /**
     * @param ?bool $value
     */
    public function setReassignConversations(?bool $value = null): self
    {
        $this->reassignConversations = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param ?string $value
     */
    public function setSource(?string $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAutoChanged(): ?string
    {
        return $this->autoChanged;
    }

    /**
     * @param ?string $value
     */
    public function setAutoChanged(?string $value = null): self
    {
        $this->autoChanged = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateBy(): ?int
    {
        return $this->updateBy;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateBy(?int $value = null): self
    {
        $this->updateBy = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdateByName(): ?string
    {
        return $this->updateByName;
    }

    /**
     * @param ?string $value
     */
    public function setUpdateByName(?string $value = null): self
    {
        $this->updateByName = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getConversationAssignmentLimit(): ?int
    {
        return $this->conversationAssignmentLimit;
    }

    /**
     * @param ?int $value
     */
    public function setConversationAssignmentLimit(?int $value = null): self
    {
        $this->conversationAssignmentLimit = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTicketAssignmentLimit(): ?int
    {
        return $this->ticketAssignmentLimit;
    }

    /**
     * @param ?int $value
     */
    public function setTicketAssignmentLimit(?int $value = null): self
    {
        $this->ticketAssignmentLimit = $value;
        return $this;
    }

    /**
     * @return ?ActivityLogMetadataTeam
     */
    public function getTeam(): ?ActivityLogMetadataTeam
    {
        return $this->team;
    }

    /**
     * @param ?ActivityLogMetadataTeam $value
     */
    public function setTeam(?ActivityLogMetadataTeam $value = null): self
    {
        $this->team = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTeamAssignmentLimit(): ?int
    {
        return $this->teamAssignmentLimit;
    }

    /**
     * @param ?int $value
     */
    public function setTeamAssignmentLimit(?int $value = null): self
    {
        $this->teamAssignmentLimit = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getConsentId(): ?int
    {
        return $this->consentId;
    }

    /**
     * @param ?int $value
     */
    public function setConsentId(?int $value = null): self
    {
        $this->consentId = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getExpiredAt(): ?DateTime
    {
        return $this->expiredAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setExpiredAt(?DateTime $value = null): self
    {
        $this->expiredAt = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getBefore(): ?array
    {
        return $this->before;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setBefore(?array $value = null): self
    {
        $this->before = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getAfter(): ?array
    {
        return $this->after;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setAfter(?array $value = null): self
    {
        $this->after = $value;
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
