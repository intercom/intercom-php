<?php

namespace Intercom\Teams\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Types\AdminPriorityLevel;

/**
 * Teams are groups of admins in Intercom.
 */
class Team extends JsonSerializableType
{
    /**
     * @var 'team' $type Value is always "team"
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The id of the team
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $name The name of the team
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var array<int> $adminIds The list of admin IDs that are a part of the team.
     */
    #[JsonProperty('admin_ids'), ArrayType(['integer'])]
    private array $adminIds;

    /**
     * @var ?AdminPriorityLevel $adminPriorityLevel
     */
    #[JsonProperty('admin_priority_level')]
    private ?AdminPriorityLevel $adminPriorityLevel;

    /**
     * @param array{
     *   type: 'team',
     *   id: string,
     *   name: string,
     *   adminIds: array<int>,
     *   adminPriorityLevel?: ?AdminPriorityLevel,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->adminIds = $values['adminIds'];
        $this->adminPriorityLevel = $values['adminPriorityLevel'] ?? null;
    }

    /**
     * @return 'team'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'team' $value
     */
    public function setType(string $value): self
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
     * @return array<int>
     */
    public function getAdminIds(): array
    {
        return $this->adminIds;
    }

    /**
     * @param array<int> $value
     */
    public function setAdminIds(array $value): self
    {
        $this->adminIds = $value;
        return $this;
    }

    /**
     * @return ?AdminPriorityLevel
     */
    public function getAdminPriorityLevel(): ?AdminPriorityLevel
    {
        return $this->adminPriorityLevel;
    }

    /**
     * @param ?AdminPriorityLevel $value
     */
    public function setAdminPriorityLevel(?AdminPriorityLevel $value = null): self
    {
        $this->adminPriorityLevel = $value;
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
