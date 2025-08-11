<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Teams\Types\Team;
use Intercom\Core\Types\ArrayType;

/**
 * This will return a list of team objects for the App.
 */
class TeamList extends JsonSerializableType
{
    /**
     * @var ?'team.list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Team> $teams A list of team objects
     */
    #[JsonProperty('teams'), ArrayType([Team::class])]
    private ?array $teams;

    /**
     * @param array{
     *   type?: ?'team.list',
     *   teams?: ?array<Team>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->teams = $values['teams'] ?? null;
    }

    /**
     * @return ?'team.list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'team.list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<Team>
     */
    public function getTeams(): ?array
    {
        return $this->teams;
    }

    /**
     * @param ?array<Team> $value
     */
    public function setTeams(?array $value = null): self
    {
        $this->teams = $value;
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
