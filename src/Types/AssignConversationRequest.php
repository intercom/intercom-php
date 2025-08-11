<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to assign a conversation
 */
class AssignConversationRequest extends JsonSerializableType
{
    /**
     * @var value-of<AssignConversationRequestType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $adminId The id of the admin who is performing the action.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @var string $assigneeId The `id` of the `admin` or `team` which will be assigned the conversation. A conversation can be assigned both an admin and a team.\nSet `0` if you want this assign to no admin or team (ie. Unassigned).
     */
    #[JsonProperty('assignee_id')]
    private string $assigneeId;

    /**
     * @var ?string $body Optionally you can send a response in the conversation when it is assigned.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @param array{
     *   type: value-of<AssignConversationRequestType>,
     *   adminId: string,
     *   assigneeId: string,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->adminId = $values['adminId'];
        $this->assigneeId = $values['assigneeId'];
        $this->body = $values['body'] ?? null;
    }

    /**
     * @return value-of<AssignConversationRequestType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<AssignConversationRequestType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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

    /**
     * @return string
     */
    public function getAssigneeId(): string
    {
        return $this->assigneeId;
    }

    /**
     * @param string $value
     */
    public function setAssigneeId(string $value): self
    {
        $this->assigneeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
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
