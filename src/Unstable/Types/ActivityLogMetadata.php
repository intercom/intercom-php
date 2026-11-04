<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

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
        $this->_setField('signInMethod');
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
        $this->_setField('externalId');
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
        $this->_setField('awayMode');
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
        $this->_setField('awayStatusReason');
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
        $this->_setField('reassignConversations');
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
        $this->_setField('source');
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
        $this->_setField('autoChanged');
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
        $this->_setField('updateBy');
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
        $this->_setField('updateByName');
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
        $this->_setField('conversationAssignmentLimit');
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
        $this->_setField('ticketAssignmentLimit');
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
