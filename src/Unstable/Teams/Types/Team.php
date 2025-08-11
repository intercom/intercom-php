<?php

namespace Intercom\Unstable\Teams\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Unstable\Types\AdminPriorityLevel;

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
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   adminIds?: ?array<int>,
     *   adminPriorityLevel?: ?AdminPriorityLevel,
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
