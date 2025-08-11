<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Admins\Types\Admin;
use Intercom\Core\Types\ArrayType;

/**
 * A list of admins associated with a given workspace.
 */
class AdminList extends JsonSerializableType
{
    /**
     * @var 'admin.list' $type String representing the object's type. Always has the value `admin.list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<Admin> $admins A list of admins associated with a given workspace.
     */
    #[JsonProperty('admins'), ArrayType([Admin::class])]
    private array $admins;

    /**
     * @param array{
     *   type: 'admin.list',
     *   admins: array<Admin>,
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
     * @return array<Admin>
     */
    public function getAdmins(): array
    {
        return $this->admins;
    }

    /**
     * @param array<Admin> $value
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
