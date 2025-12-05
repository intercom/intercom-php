<?php

namespace Intercom\Jobs\Requests;

use Intercom\Core\Json\JsonSerializableType;

class JobsStatusRequest extends JsonSerializableType
{
    /**
     * @var string $jobId The unique identifier for the job which is given by Intercom
     */
    private string $jobId;

    /**
     * @param array{
     *   jobId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobId = $values['jobId'];
    }

    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->jobId;
    }

    /**
     * @param string $value
     */
    public function setJobId(string $value): self
    {
        $this->jobId = $value;
        return $this;
    }
}
