<?php

namespace Intercom\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindAdminRequest extends JsonSerializableType
{
    /**
     * @var string $adminId The unique identifier of a given admin
     */
    private string $adminId;

    /**
     * @param array{
     *   adminId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminId = $values['adminId'];
    }

    /**
     * @return string
     */
    public function getAdminId(): string
    {
        return $this->adminId;
    }

    /**
     * @param string $value
     */
    public function setAdminId(string $value): self
    {
        $this->adminId = $value;
        return $this;
    }
}
