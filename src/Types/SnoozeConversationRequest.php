<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Payload of the request to snooze a conversation
 */
class SnoozeConversationRequest extends JsonSerializableType
{
    /**
     * @var string $adminId The id of the admin who is performing the action.
     */
    #[JsonProperty('admin_id')]
    private string $adminId;

    /**
     * @var int $snoozedUntil The time you want the conversation to reopen.
     */
    #[JsonProperty('snoozed_until')]
    private int $snoozedUntil;

    /**
     * @param array{
     *   adminId: string,
     *   snoozedUntil: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminId = $values['adminId'];
        $this->snoozedUntil = $values['snoozedUntil'];
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
     * @return int
     */
    public function getSnoozedUntil(): int
    {
        return $this->snoozedUntil;
    }

    /**
     * @param int $value
     */
    public function setSnoozedUntil(int $value): self
    {
        $this->snoozedUntil = $value;
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
