<?php

namespace Intercom\Visitors\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindVisitorRequest extends JsonSerializableType
{
    /**
     * @var string $userId The user_id of the Visitor you want to retrieve.
     */
    private string $userId;

    /**
     * @param array{
     *   userId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
        return $this;
    }
}
