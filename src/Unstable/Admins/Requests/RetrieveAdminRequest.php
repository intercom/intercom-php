<?php

namespace Intercom\Unstable\Admins\Requests;

use Intercom\Core\Json\JsonSerializableType;

class RetrieveAdminRequest extends JsonSerializableType
{
    /**
     * @var int $id The unique identifier of a given admin
     */
    private int $id;

    /**
     * @param array{
     *   id: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }
}
