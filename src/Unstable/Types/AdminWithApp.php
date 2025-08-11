<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Admins are the teammate accounts that have access to a workspace
 */
class AdminWithApp extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `admin`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id representing the admin.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the admin.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $email The email of the admin.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $jobTitle The job title of the admin.
     */
    #[JsonProperty('job_title')]
    private ?string $jobTitle;

    /**
     * @var ?bool $awayModeEnabled Identifies if this admin is currently set in away mode.
     */
    #[JsonProperty('away_mode_enabled')]
    private ?bool $awayModeEnabled;

    /**
     * @var ?bool $awayModeReassign Identifies if this admin is set to automatically reassign new conversations to the apps default inbox.
     */
    #[JsonProperty('away_mode_reassign')]
    private ?bool $awayModeReassign;

    /**
     * @var ?bool $hasInboxSeat Identifies if this admin has a paid inbox seat to restrict/allow features that require them.
     */
    #[JsonProperty('has_inbox_seat')]
    private ?bool $hasInboxSeat;

    /**
     * @var ?array<int> $teamIds This is a list of ids of the teams that this admin is part of.
     */
    #[JsonProperty('team_ids'), ArrayType(['integer'])]
    private ?array $teamIds;

    /**
     * @var ?AdminWithAppAvatar $avatar This object represents the avatar associated with the admin.
     */
    #[JsonProperty('avatar')]
    private ?AdminWithAppAvatar $avatar;

    /**
     * @var ?bool $emailVerified Identifies if this admin's email is verified.
     */
    #[JsonProperty('email_verified')]
    private ?bool $emailVerified;

    /**
     * @var ?App $app App that the admin belongs to.
     */
    #[JsonProperty('app')]
    private ?App $app;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   email?: ?string,
     *   jobTitle?: ?string,
     *   awayModeEnabled?: ?bool,
     *   awayModeReassign?: ?bool,
     *   hasInboxSeat?: ?bool,
     *   teamIds?: ?array<int>,
     *   avatar?: ?AdminWithAppAvatar,
     *   emailVerified?: ?bool,
     *   app?: ?App,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->jobTitle = $values['jobTitle'] ?? null;
        $this->awayModeEnabled = $values['awayModeEnabled'] ?? null;
        $this->awayModeReassign = $values['awayModeReassign'] ?? null;
        $this->hasInboxSeat = $values['hasInboxSeat'] ?? null;
        $this->teamIds = $values['teamIds'] ?? null;
        $this->avatar = $values['avatar'] ?? null;
        $this->emailVerified = $values['emailVerified'] ?? null;
        $this->app = $values['app'] ?? null;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
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
     * @return ?bool
     */
    public function getAwayModeEnabled(): ?bool
    {
        return $this->awayModeEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setAwayModeEnabled(?bool $value = null): self
    {
        $this->awayModeEnabled = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAwayModeReassign(): ?bool
    {
        return $this->awayModeReassign;
    }

    /**
     * @param ?bool $value
     */
    public function setAwayModeReassign(?bool $value = null): self
    {
        $this->awayModeReassign = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getHasInboxSeat(): ?bool
    {
        return $this->hasInboxSeat;
    }

    /**
     * @param ?bool $value
     */
    public function setHasInboxSeat(?bool $value = null): self
    {
        $this->hasInboxSeat = $value;
        return $this;
    }

    /**
     * @return ?array<int>
     */
    public function getTeamIds(): ?array
    {
        return $this->teamIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setTeamIds(?array $value = null): self
    {
        $this->teamIds = $value;
        return $this;
    }

    /**
     * @return ?AdminWithAppAvatar
     */
    public function getAvatar(): ?AdminWithAppAvatar
    {
        return $this->avatar;
    }

    /**
     * @param ?AdminWithAppAvatar $value
     */
    public function setAvatar(?AdminWithAppAvatar $value = null): self
    {
        $this->avatar = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    /**
     * @param ?bool $value
     */
    public function setEmailVerified(?bool $value = null): self
    {
        $this->emailVerified = $value;
        return $this;
    }

    /**
     * @return ?App
     */
    public function getApp(): ?App
    {
        return $this->app;
    }

    /**
     * @param ?App $value
     */
    public function setApp(?App $value = null): self
    {
        $this->app = $value;
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
