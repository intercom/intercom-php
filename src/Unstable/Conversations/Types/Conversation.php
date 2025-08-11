<?php

namespace Intercom\Unstable\Conversations\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\Tags;
use Intercom\Unstable\Types\ConversationRating;
use Intercom\Unstable\Types\ConversationSource;
use Intercom\Unstable\Types\ConversationContacts;
use Intercom\Unstable\Types\ConversationTeammates;
use DateTime;
use Intercom\Unstable\Types\CustomObjectInstanceList;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;
use Intercom\Unstable\Types\ConversationFirstContactReply;
use Intercom\Unstable\Types\SlaApplied;
use Intercom\Unstable\Types\ConversationStatistics;
use Intercom\Unstable\Types\ConversationParts;
use Intercom\Unstable\Types\LinkedObjectList;
use Intercom\Unstable\AiAgent\Types\AiAgent;

/**
 * Conversations are how you can communicate with users in Intercom. They are created when a contact replies to an outbound message, or when one admin directly sends a message to a single contact.
 */
class Conversation extends JsonSerializableType
{
    /**
     * @var ?string $type Always conversation.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id representing the conversation.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $title The title given to the conversation.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?int $createdAt The time the conversation was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The last time the conversation was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?int $waitingSince The last time a Contact responded to an Admin. In other words, the time a customer started waiting for a response. Set to null if last reply is from an Admin.
     */
    #[JsonProperty('waiting_since')]
    private ?int $waitingSince;

    /**
     * @var ?int $snoozedUntil If set this is the time in the future when this conversation will be marked as open. i.e. it will be in a snoozed state until this time. i.e. it will be in a snoozed state until this time.
     */
    #[JsonProperty('snoozed_until')]
    private ?int $snoozedUntil;

    /**
     * @var ?bool $open Indicates whether a conversation is open (true) or closed (false).
     */
    #[JsonProperty('open')]
    private ?bool $open;

    /**
     * @var ?value-of<ConversationState> $state Can be set to "open", "closed" or "snoozed".
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?bool $read Indicates whether a conversation has been read.
     */
    #[JsonProperty('read')]
    private ?bool $read;

    /**
     * @var ?value-of<ConversationPriority> $priority If marked as priority, it will return priority or else not_priority.
     */
    #[JsonProperty('priority')]
    private ?string $priority;

    /**
     * @var ?int $adminAssigneeId The id of the admin assigned to the conversation. If it's not assigned to an admin it will return null.
     */
    #[JsonProperty('admin_assignee_id')]
    private ?int $adminAssigneeId;

    /**
     * @var ?string $teamAssigneeId The id of the team assigned to the conversation. If it's not assigned to a team it will return null.
     */
    #[JsonProperty('team_assignee_id')]
    private ?string $teamAssigneeId;

    /**
     * @var ?string $companyId The ID of the company that the conversation is associated with. The unique identifier for the company which is given by Intercom.
     */
    #[JsonProperty('company_id')]
    private ?string $companyId;

    /**
     * @var ?Tags $tags
     */
    #[JsonProperty('tags')]
    private ?Tags $tags;

    /**
     * @var ?ConversationRating $conversationRating
     */
    #[JsonProperty('conversation_rating')]
    private ?ConversationRating $conversationRating;

    /**
     * @var ?ConversationSource $source
     */
    #[JsonProperty('source')]
    private ?ConversationSource $source;

    /**
     * @var ?ConversationContacts $contacts
     */
    #[JsonProperty('contacts')]
    private ?ConversationContacts $contacts;

    /**
     * @var ?ConversationTeammates $teammates
     */
    #[JsonProperty('teammates')]
    private ?ConversationTeammates $teammates;

    /**
     * @var ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => new Union('string', 'integer', 'datetime', CustomObjectInstanceList::class)])]
    private ?array $customAttributes;

    /**
     * @var ?ConversationFirstContactReply $firstContactReply
     */
    #[JsonProperty('first_contact_reply')]
    private ?ConversationFirstContactReply $firstContactReply;

    /**
     * @var ?SlaApplied $slaApplied
     */
    #[JsonProperty('sla_applied')]
    private ?SlaApplied $slaApplied;

    /**
     * @var ?ConversationStatistics $statistics
     */
    #[JsonProperty('statistics')]
    private ?ConversationStatistics $statistics;

    /**
     * @var ?ConversationParts $conversationParts
     */
    #[JsonProperty('conversation_parts')]
    private ?ConversationParts $conversationParts;

    /**
     * @var ?LinkedObjectList $linkedObjects
     */
    #[JsonProperty('linked_objects')]
    private ?LinkedObjectList $linkedObjects;

    /**
     * @var ?bool $aiAgentParticipated Indicates whether the AI Agent participated in the conversation.
     */
    #[JsonProperty('ai_agent_participated')]
    private ?bool $aiAgentParticipated;

    /**
     * @var ?AiAgent $aiAgent
     */
    #[JsonProperty('ai_agent')]
    private ?AiAgent $aiAgent;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   title?: ?string,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   waitingSince?: ?int,
     *   snoozedUntil?: ?int,
     *   open?: ?bool,
     *   state?: ?value-of<ConversationState>,
     *   read?: ?bool,
     *   priority?: ?value-of<ConversationPriority>,
     *   adminAssigneeId?: ?int,
     *   teamAssigneeId?: ?string,
     *   companyId?: ?string,
     *   tags?: ?Tags,
     *   conversationRating?: ?ConversationRating,
     *   source?: ?ConversationSource,
     *   contacts?: ?ConversationContacts,
     *   teammates?: ?ConversationTeammates,
     *   customAttributes?: ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>,
     *   firstContactReply?: ?ConversationFirstContactReply,
     *   slaApplied?: ?SlaApplied,
     *   statistics?: ?ConversationStatistics,
     *   conversationParts?: ?ConversationParts,
     *   linkedObjects?: ?LinkedObjectList,
     *   aiAgentParticipated?: ?bool,
     *   aiAgent?: ?AiAgent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->waitingSince = $values['waitingSince'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->open = $values['open'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->read = $values['read'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->adminAssigneeId = $values['adminAssigneeId'] ?? null;
        $this->teamAssigneeId = $values['teamAssigneeId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->conversationRating = $values['conversationRating'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->contacts = $values['contacts'] ?? null;
        $this->teammates = $values['teammates'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->firstContactReply = $values['firstContactReply'] ?? null;
        $this->slaApplied = $values['slaApplied'] ?? null;
        $this->statistics = $values['statistics'] ?? null;
        $this->conversationParts = $values['conversationParts'] ?? null;
        $this->linkedObjects = $values['linkedObjects'] ?? null;
        $this->aiAgentParticipated = $values['aiAgentParticipated'] ?? null;
        $this->aiAgent = $values['aiAgent'] ?? null;
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
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getWaitingSince(): ?int
    {
        return $this->waitingSince;
    }

    /**
     * @param ?int $value
     */
    public function setWaitingSince(?int $value = null): self
    {
        $this->waitingSince = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSnoozedUntil(): ?int
    {
        return $this->snoozedUntil;
    }

    /**
     * @param ?int $value
     */
    public function setSnoozedUntil(?int $value = null): self
    {
        $this->snoozedUntil = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getOpen(): ?bool
    {
        return $this->open;
    }

    /**
     * @param ?bool $value
     */
    public function setOpen(?bool $value = null): self
    {
        $this->open = $value;
        return $this;
    }

    /**
     * @return ?value-of<ConversationState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<ConversationState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRead(): ?bool
    {
        return $this->read;
    }

    /**
     * @param ?bool $value
     */
    public function setRead(?bool $value = null): self
    {
        $this->read = $value;
        return $this;
    }

    /**
     * @return ?value-of<ConversationPriority>
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param ?value-of<ConversationPriority> $value
     */
    public function setPriority(?string $value = null): self
    {
        $this->priority = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAdminAssigneeId(): ?int
    {
        return $this->adminAssigneeId;
    }

    /**
     * @param ?int $value
     */
    public function setAdminAssigneeId(?int $value = null): self
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
     * @return ?string
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyId(?string $value = null): self
    {
        $this->companyId = $value;
        return $this;
    }

    /**
     * @return ?Tags
     */
    public function getTags(): ?Tags
    {
        return $this->tags;
    }

    /**
     * @param ?Tags $value
     */
    public function setTags(?Tags $value = null): self
    {
        $this->tags = $value;
        return $this;
    }

    /**
     * @return ?ConversationRating
     */
    public function getConversationRating(): ?ConversationRating
    {
        return $this->conversationRating;
    }

    /**
     * @param ?ConversationRating $value
     */
    public function setConversationRating(?ConversationRating $value = null): self
    {
        $this->conversationRating = $value;
        return $this;
    }

    /**
     * @return ?ConversationSource
     */
    public function getSource(): ?ConversationSource
    {
        return $this->source;
    }

    /**
     * @param ?ConversationSource $value
     */
    public function setSource(?ConversationSource $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?ConversationContacts
     */
    public function getContacts(): ?ConversationContacts
    {
        return $this->contacts;
    }

    /**
     * @param ?ConversationContacts $value
     */
    public function setContacts(?ConversationContacts $value = null): self
    {
        $this->contacts = $value;
        return $this;
    }

    /**
     * @return ?ConversationTeammates
     */
    public function getTeammates(): ?ConversationTeammates
    {
        return $this->teammates;
    }

    /**
     * @param ?ConversationTeammates $value
     */
    public function setTeammates(?ConversationTeammates $value = null): self
    {
        $this->teammates = $value;
        return $this;
    }

    /**
     * @return ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, (
     *    string
     *   |int
     *   |DateTime
     *   |CustomObjectInstanceList
     * )> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }

    /**
     * @return ?ConversationFirstContactReply
     */
    public function getFirstContactReply(): ?ConversationFirstContactReply
    {
        return $this->firstContactReply;
    }

    /**
     * @param ?ConversationFirstContactReply $value
     */
    public function setFirstContactReply(?ConversationFirstContactReply $value = null): self
    {
        $this->firstContactReply = $value;
        return $this;
    }

    /**
     * @return ?SlaApplied
     */
    public function getSlaApplied(): ?SlaApplied
    {
        return $this->slaApplied;
    }

    /**
     * @param ?SlaApplied $value
     */
    public function setSlaApplied(?SlaApplied $value = null): self
    {
        $this->slaApplied = $value;
        return $this;
    }

    /**
     * @return ?ConversationStatistics
     */
    public function getStatistics(): ?ConversationStatistics
    {
        return $this->statistics;
    }

    /**
     * @param ?ConversationStatistics $value
     */
    public function setStatistics(?ConversationStatistics $value = null): self
    {
        $this->statistics = $value;
        return $this;
    }

    /**
     * @return ?ConversationParts
     */
    public function getConversationParts(): ?ConversationParts
    {
        return $this->conversationParts;
    }

    /**
     * @param ?ConversationParts $value
     */
    public function setConversationParts(?ConversationParts $value = null): self
    {
        $this->conversationParts = $value;
        return $this;
    }

    /**
     * @return ?LinkedObjectList
     */
    public function getLinkedObjects(): ?LinkedObjectList
    {
        return $this->linkedObjects;
    }

    /**
     * @param ?LinkedObjectList $value
     */
    public function setLinkedObjects(?LinkedObjectList $value = null): self
    {
        $this->linkedObjects = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAiAgentParticipated(): ?bool
    {
        return $this->aiAgentParticipated;
    }

    /**
     * @param ?bool $value
     */
    public function setAiAgentParticipated(?bool $value = null): self
    {
        $this->aiAgentParticipated = $value;
        return $this;
    }

    /**
     * @return ?AiAgent
     */
    public function getAiAgent(): ?AiAgent
    {
        return $this->aiAgent;
    }

    /**
     * @param ?AiAgent $value
     */
    public function setAiAgent(?AiAgent $value = null): self
    {
        $this->aiAgent = $value;
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
