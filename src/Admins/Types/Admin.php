<?php

namespace Intercom\Admins\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Types\TeamPriorityLevel;

/**
 * Admins are teammate accounts that have access to a workspace.
 */
class Admin extends JsonSerializableType
{
    /**
     * @var ?'admin' $type String representing the object's type. Always has the value `admin`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var string $id The id representing the admin.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $name The name of the admin.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $email The email of the admin.
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @var ?string $jobTitle The job title of the admin.
     */
    #[JsonProperty('job_title')]
    private ?string $jobTitle;

    /**
     * @var bool $awayModeEnabled Identifies if this admin is currently set in away mode.
     */
    #[JsonProperty('away_mode_enabled')]
    private bool $awayModeEnabled;

    /**
     * @var bool $awayModeReassign Identifies if this admin is set to automatically reassign new conversations to the apps default inbox.
     */
    #[JsonProperty('away_mode_reassign')]
    private bool $awayModeReassign;

    /**
     * @var bool $hasInboxSeat Identifies if this admin has a paid inbox seat to restrict/allow features that require them.
     */
    #[JsonProperty('has_inbox_seat')]
    private bool $hasInboxSeat;

    /**
     * @var array<int> $teamIds This object represents the avatar associated with the admin.
     */
    #[JsonProperty('team_ids'), ArrayType(['integer'])]
    private array $teamIds;

    /**
     * @var ?AdminAvatar $avatar The avatar object associated with the admin
     */
    #[JsonProperty('avatar')]
    private ?AdminAvatar $avatar;

    /**
     * @var ?TeamPriorityLevel $teamPriorityLevel
     */
    #[JsonProperty('team_priority_level')]
    private ?TeamPriorityLevel $teamPriorityLevel;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   email: string,
     *   awayModeEnabled: bool,
     *   awayModeReassign: bool,
     *   hasInboxSeat: bool,
     *   teamIds: array<int>,
     *   type?: ?'admin',
     *   jobTitle?: ?string,
     *   avatar?: ?AdminAvatar,
     *   teamPriorityLevel?: ?TeamPriorityLevel,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->jobTitle = $values['jobTitle'] ?? null;
        $this->awayModeEnabled = $values['awayModeEnabled'];
        $this->awayModeReassign = $values['awayModeReassign'];
        $this->hasInboxSeat = $values['hasInboxSeat'];
        $this->teamIds = $values['teamIds'];
        $this->avatar = $values['avatar'] ?? null;
        $this->teamPriorityLevel = $values['teamPriorityLevel'] ?? null;
    }

    /**
     * @return ?'admin'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'admin' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * @param ?string $value
     */
    public function setJobTitle(?string $value = null): self
    {
        $this->jobTitle = $value;
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
     * @return bool
     */
    public function getHasInboxSeat(): bool
    {
        return $this->hasInboxSeat;
    }

    /**
     * @param bool $value
     */
    public function setHasInboxSeat(bool $value): self
    {
        $this->hasInboxSeat = $value;
        return $this;
    }

    /**
     * @return array<int>
     */
    public function getTeamIds(): array
    {
        return $this->teamIds;
    }

    /**
     * @param array<int> $value
     */
    public function setTeamIds(array $value): self
    {
        $this->teamIds = $value;
        return $this;
    }

    /**
     * @return ?AdminAvatar
     */
    public function getAvatar(): ?AdminAvatar
    {
        return $this->avatar;
    }

    /**
     * @param ?AdminAvatar $value
     */
    public function setAvatar(?AdminAvatar $value = null): self
    {
        $this->avatar = $value;
        return $this;
    }

    /**
     * @return ?TeamPriorityLevel
     */
    public function getTeamPriorityLevel(): ?TeamPriorityLevel
    {
        return $this->teamPriorityLevel;
    }

    /**
     * @param ?TeamPriorityLevel $value
     */
    public function setTeamPriorityLevel(?TeamPriorityLevel $value = null): self
    {
        $this->teamPriorityLevel = $value;
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
