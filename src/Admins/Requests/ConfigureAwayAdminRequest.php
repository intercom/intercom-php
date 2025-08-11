<?php

namespace Intercom\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class ConfigureAwayAdminRequest extends JsonSerializableType
{
    /**
     * @var string $adminId The unique identifier of a given admin
     */
    private string $adminId;

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
     * @param array{
     *   adminId: string,
     *   awayModeEnabled: bool,
     *   awayModeReassign: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminId = $values['adminId'];
        $this->awayModeEnabled = $values['awayModeEnabled'];
        $this->awayModeReassign = $values['awayModeReassign'];
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
}
