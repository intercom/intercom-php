<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Admin priority levels for teams
 */
class TeamPriorityLevel extends JsonSerializableType
{
    /**
     * @var ?array<int> $primaryTeamIds The primary team ids for the team
     */
    #[JsonProperty('primary_team_ids'), ArrayType(['integer'])]
    private ?array $primaryTeamIds;

    /**
     * @var ?array<int> $secondaryTeamIds The secondary team ids for the team
     */
    #[JsonProperty('secondary_team_ids'), ArrayType(['integer'])]
    private ?array $secondaryTeamIds;

    /**
     * @param array{
     *   primaryTeamIds?: ?array<int>,
     *   secondaryTeamIds?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->primaryTeamIds = $values['primaryTeamIds'] ?? null;
        $this->secondaryTeamIds = $values['secondaryTeamIds'] ?? null;
    }

    /**
     * @return ?array<int>
     */
    public function getPrimaryTeamIds(): ?array
    {
        return $this->primaryTeamIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setPrimaryTeamIds(?array $value = null): self
    {
        $this->primaryTeamIds = $value;
        return $this;
    }

    /**
     * @return ?array<int>
     */
    public function getSecondaryTeamIds(): ?array
    {
        return $this->secondaryTeamIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setSecondaryTeamIds(?array $value = null): self
    {
        $this->secondaryTeamIds = $value;
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
