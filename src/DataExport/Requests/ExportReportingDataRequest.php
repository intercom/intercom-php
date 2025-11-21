<?php

namespace Intercom\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ExportReportingDataRequest extends JsonSerializableType
{
    /**
     * @var string $jobIdentifier Unique identifier of the job.
     */
    private string $jobIdentifier;

    /**
     * @var string $appId The Intercom defined code of the workspace the company is associated to.
     */
    private string $appId;

    /**
     * @var string $clientId
     */
    private string $clientId;

    /**
     * @param array{
     *   jobIdentifier: string,
     *   appId: string,
     *   clientId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobIdentifier = $values['jobIdentifier'];
        $this->appId = $values['appId'];
        $this->clientId = $values['clientId'];
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

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $value
     */
    public function setAppId(string $value): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $value
     */
    public function setClientId(string $value): self
    {
        $this->clientId = $value;
        return $this;
    }
}
