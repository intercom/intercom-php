<?php

namespace Intercom\Unstable\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;

class CancelDataExportRequest extends JsonSerializableType
{
    /**
     * @var string $jobIdentifier job_identifier
     */
    private string $jobIdentifier;

    /**
     * @param array{
     *   jobIdentifier: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobIdentifier = $values['jobIdentifier'];
    }

    /**
     * @return string
     */
    public function getJobIdentifier(): string
    {
        return $this->jobIdentifier;
    }

    /**
     * @param string $value
     */
    public function setJobIdentifier(string $value): self
    {
        $this->jobIdentifier = $value;
        return $this;
    }
}
