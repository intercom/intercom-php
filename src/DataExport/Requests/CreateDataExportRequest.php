<?php

namespace Intercom\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CreateDataExportRequest extends JsonSerializableType
{
    /**
     * @var int $createdAtAfter The start date that you request data for. It must be formatted as a unix timestamp.
     */
    #[JsonProperty('created_at_after')]
    private int $createdAtAfter;

    /**
     * @var int $createdAtBefore The end date that you request data for. It must be formatted as a unix timestamp.
     */
    #[JsonProperty('created_at_before')]
    private int $createdAtBefore;

    /**
     * @param array{
     *   createdAtAfter: int,
     *   createdAtBefore: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAtAfter = $values['createdAtAfter'];
        $this->createdAtBefore = $values['createdAtBefore'];
    }

    /**
     * @return int
     */
    public function getCreatedAtAfter(): int
    {
        return $this->createdAtAfter;
    }

    /**
     * @param int $value
     */
    public function setCreatedAtAfter(int $value): self
    {
        $this->createdAtAfter = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAtBefore(): int
    {
        return $this->createdAtBefore;
    }

    /**
     * @param int $value
     */
    public function setCreatedAtBefore(int $value): self
    {
        $this->createdAtBefore = $value;
        return $this;
    }
}
