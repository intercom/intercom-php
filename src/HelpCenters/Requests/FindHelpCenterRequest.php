<?php

namespace Intercom\HelpCenters\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindHelpCenterRequest extends JsonSerializableType
{
    /**
     * @var int $helpCenterId The unique identifier for the collection which is given by Intercom.
     */
    private int $helpCenterId;

    /**
     * @param array{
     *   helpCenterId: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->helpCenterId = $values['helpCenterId'];
    }

    /**
     * @return int
     */
    public function getHelpCenterId(): int
    {
        return $this->helpCenterId;
    }

    /**
     * @param int $value
     */
    public function setHelpCenterId(int $value): self
    {
        $this->helpCenterId = $value;
        return $this;
    }
}
