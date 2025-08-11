<?php

namespace Intercom\Teams\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindTeamRequest extends JsonSerializableType
{
    /**
     * @var string $teamId The unique identifier of a given team.
     */
    private string $teamId;

    /**
     * @param array{
     *   teamId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->teamId = $values['teamId'];
    }

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->teamId;
    }

    /**
     * @param string $value
     */
    public function setTeamId(string $value): self
    {
        $this->teamId = $value;
        return $this;
    }
}
