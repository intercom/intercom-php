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
     * @var ?string $type Value is always "team"
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the team
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the team
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?array<int> $adminIds The list of admin IDs that are a part of the team.
     */
    #[JsonProperty('admin_ids'), ArrayType(['integer'])]
    private ?array $adminIds;

    /**
     * @var ?AdminPriorityLevel $adminPriorityLevel
     */
    #[JsonProperty('admin_priority_level')]
    private ?AdminPriorityLevel $adminPriorityLevel;

    /**
     * @var ?int $assignmentLimit The assignment limit for the team. This field is only present when the team's distribution type is load balanced.
     */
    #[JsonProperty('assignment_limit')]
    private ?int $assignmentLimit;

    /**
     * @var ?string $distributionMethod Describes how assignments are distributed among the team members
     */
    #[JsonProperty('distribution_method')]
    private ?string $distributionMethod;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   adminIds?: ?array<int>,
     *   adminPriorityLevel?: ?AdminPriorityLevel,
     *   assignmentLimit?: ?int,
     *   distributionMethod?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->adminIds = $values['adminIds'] ?? null;
        $this->adminPriorityLevel = $values['adminPriorityLevel'] ?? null;
        $this->assignmentLimit = $values['assignmentLimit'] ?? null;
        $this->distributionMethod = $values['distributionMethod'] ?? null;
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
     * @return ?array<int>
     */
    public function getAdminIds(): ?array
    {
        return $this->adminIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setAdminIds(?array $value = null): self
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
     * @return ?int
     */
    public function getAssignmentLimit(): ?int
    {
        return $this->assignmentLimit;
    }

    /**
     * @param ?int $value
     */
    public function setAssignmentLimit(?int $value = null): self
    {
        $this->assignmentLimit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDistributionMethod(): ?string
    {
        return $this->distributionMethod;
    }

    /**
     * @param ?string $value
     */
    public function setDistributionMethod(?string $value = null): self
    {
        $this->distributionMethod = $value;
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
