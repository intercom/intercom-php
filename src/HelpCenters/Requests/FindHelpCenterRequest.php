<?php

namespace Intercom\HelpCenters\Requests;

use Intercom\Core\Json\JsonSerializableType;

class FindHelpCenterRequest extends JsonSerializableType
{
    /**
     * @var string $helpCenterId The unique identifier for the Help Center which is given by Intercom.
     */
    private string $helpCenterId;

    /**
     * @param array{
     *   helpCenterId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->helpCenterId = $values['helpCenterId'];
    }

    /**
     * @return string
     */
    public function getHelpCenterId(): string
    {
        return $this->helpCenterId;
    }

    /**
     * @param string $value
     */
    public function setHelpCenterId(string $value): self
    {
        $this->helpCenterId = $value;
        return $this;
    }
}
