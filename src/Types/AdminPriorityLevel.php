<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Admin priority levels for the team
 */
class AdminPriorityLevel extends JsonSerializableType
{
    /**
     * @var ?array<int> $primaryAdminIds The primary admin ids for the team
     */
    #[JsonProperty('primary_admin_ids'), ArrayType(['integer'])]
    private ?array $primaryAdminIds;

    /**
     * @var ?array<int> $secondaryAdminIds The secondary admin ids for the team
     */
    #[JsonProperty('secondary_admin_ids'), ArrayType(['integer'])]
    private ?array $secondaryAdminIds;

    /**
     * @param array{
     *   primaryAdminIds?: ?array<int>,
     *   secondaryAdminIds?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->primaryAdminIds = $values['primaryAdminIds'] ?? null;
        $this->secondaryAdminIds = $values['secondaryAdminIds'] ?? null;
    }

    /**
     * @return ?array<int>
     */
    public function getPrimaryAdminIds(): ?array
    {
        return $this->primaryAdminIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setPrimaryAdminIds(?array $value = null): self
    {
        $this->primaryAdminIds = $value;
        return $this;
    }

    /**
     * @return ?array<int>
     */
    public function getSecondaryAdminIds(): ?array
    {
        return $this->secondaryAdminIds;
    }

    /**
     * @param ?array<int> $value
     */
    public function setSecondaryAdminIds(?array $value = null): self
    {
        $this->secondaryAdminIds = $value;
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
