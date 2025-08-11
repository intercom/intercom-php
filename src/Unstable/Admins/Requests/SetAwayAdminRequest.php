<?php

namespace Intercom\Unstable\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class SetAwayAdminRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier of a given admin
     */
    private int $id;

    /**
     * @var bool $awayModeEnabled Set to "true" to change the status of the admin to away.
     */
    #[JsonProperty('away_mode_enabled')]
    private bool $awayModeEnabled;

    /**
     * @var bool $awayModeReassign Set to "true" to assign any new conversation replies to your default inbox.
     */
    #[JsonProperty('away_mode_reassign')]
    private bool $awayModeReassign;

    /**
     * @var ?int $awayStatusReasonId The unique identifier of the away status reason
     */
    #[JsonProperty('away_status_reason_id')]
    private ?int $awayStatusReasonId;

    /**
     * @param array{
     *   id: int,
     *   awayModeEnabled: bool,
     *   awayModeReassign: bool,
     *   awayStatusReasonId?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->awayModeEnabled = $values['awayModeEnabled'];
        $this->awayModeReassign = $values['awayModeReassign'];
        $this->awayStatusReasonId = $values['awayStatusReasonId'] ?? null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAwayModeEnabled(): bool
    {
        return $this->awayModeEnabled;
    }

    /**
     * @param bool $value
     */
    public function setAwayModeEnabled(bool $value): self
    {
        $this->awayModeEnabled = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAwayModeReassign(): bool
    {
        return $this->awayModeReassign;
    }

    /**
     * @param bool $value
     */
    public function setAwayModeReassign(bool $value): self
    {
        $this->awayModeReassign = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAwayStatusReasonId(): ?int
    {
        return $this->awayStatusReasonId;
    }

    /**
     * @param ?int $value
     */
    public function setAwayStatusReasonId(?int $value = null): self
    {
        $this->awayStatusReasonId = $value;
        return $this;
    }
}
