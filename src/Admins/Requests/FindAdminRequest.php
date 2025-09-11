<?php

namespace Intercom\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindAdminRequest extends JsonSerializableType
{
    /**
     * @var int $adminId The unique identifier of a given admin
     */
    private int $adminId;

    /**
     * @param array{
     *   adminId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminId = $values['adminId'];
    }

    /**
     * @return int
     */
    public function getAdminId(): int
    {
        return $this->adminId;
    }

    /**
     * @param int $value
     */
    public function setAdminId(int $value): self
    {
        $this->adminId = $value;
        return $this;
    }
}
