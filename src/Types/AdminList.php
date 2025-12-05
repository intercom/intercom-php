<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list of admins associated with a given workspace.
 */
class AdminList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `admin.list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?Admin> $admins A list of admins associated with a given workspace.
     */
    #[JsonProperty('admins'), ArrayType([new Union(Admin::class, 'null')])]
    private ?array $admins;

    /**
     * @param array{
     *   type?: ?string,
     *   admins?: ?array<?Admin>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->admins = $values['admins'] ?? null;
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
     * @return ?array<?Admin>
     */
    public function getAdmins(): ?array
    {
        return $this->admins;
    }

    /**
     * @param ?array<?Admin> $value
     */
    public function setAdmins(?array $value = null): self
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
