<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The list of teammates who participated in the conversation (wrote at least one conversation part).
 */
class ConversationTeammates extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the object - `admin.list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<Reference> $teammates The list of teammates who participated in the conversation (wrote at least one conversation part).
     */
    #[JsonProperty('teammates'), ArrayType([Reference::class])]
    private ?array $teammates;

    /**
     * @param array{
     *   type?: ?string,
     *   teammates?: ?array<Reference>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->teammates = $values['teammates'] ?? null;
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
     * @return ?array<Reference>
     */
    public function getTeammates(): ?array
    {
        return $this->teammates;
    }

    /**
     * @param ?array<Reference> $value
     */
    public function setTeammates(?array $value = null): self
    {
        $this->teammates = $value;
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
