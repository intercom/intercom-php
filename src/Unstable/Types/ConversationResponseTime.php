<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Details of first response time of assigned team in seconds.
 */
class ConversationResponseTime extends JsonSerializableType
{
    /**
     * @var ?int $teamId Id of the assigned team.
     */
    #[JsonProperty('team_id')]
    private ?int $teamId;

    /**
     * @var ?string $teamName Name of the assigned Team, null if team does not exist, Unassigned if no team is assigned.
     */
    #[JsonProperty('team_name')]
    private ?string $teamName;

    /**
     * @var ?int $responseTime First response time of assigned team in seconds.
     */
    #[JsonProperty('response_time')]
    private ?int $responseTime;

    /**
     * @param array{
     *   teamId?: ?int,
     *   teamName?: ?string,
     *   responseTime?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamId = $values['teamId'] ?? null;
        $this->teamName = $values['teamName'] ?? null;
        $this->responseTime = $values['responseTime'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    /**
     * @param ?int $value
     */
    public function setTeamId(?int $value = null): self
    {
        $this->teamId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    /**
     * @param ?string $value
     */
    public function setTeamName(?string $value = null): self
    {
        $this->teamName = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getResponseTime(): ?int
    {
        return $this->responseTime;
    }

    /**
     * @param ?int $value
     */
    public function setResponseTime(?int $value = null): self
    {
        $this->responseTime = $value;
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
