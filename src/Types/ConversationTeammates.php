<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The list of teammates who participated in the conversation (wrote at least one conversation part).
 */
class ConversationTeammates extends JsonSerializableType
{
    /**
     * @var 'admin.list' $type The type of the object - `admin.list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<Reference> $admins The list of teammates who participated in the conversation (wrote at least one conversation part).
     */
    #[JsonProperty('admins'), ArrayType([Reference::class])]
    private array $admins;

    /**
     * @param array{
     *   type: 'admin.list',
     *   admins: array<Reference>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->admins = $values['admins'];
    }

    /**
     * @return 'admin.list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'admin.list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<Reference>
     */
    public function getAdmins(): array
    {
        return $this->admins;
    }

    /**
     * @param array<Reference> $value
     */
    public function setAdmins(array $value): self
    {
        $this->admins = $value;
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
