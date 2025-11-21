<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Details about the team whose assignment limit was changed.
 */
class ActivityLogMetadataTeam extends JsonSerializableType
{
    /**
     * @var ?int $id The ID of the team.
     */
    #[JsonProperty('id')]
    private ?int $id;

    /**
     * @var ?string $name The name of the team.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @param array{
     *   id?: ?int,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $value
     */
    public function setId(?int $value = null): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
