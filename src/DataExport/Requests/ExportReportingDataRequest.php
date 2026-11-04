<?php

namespace Intercom\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;

class ExportReportingDataRequest extends JsonSerializableType
{
    /**
     * @var string $jobIdentifierPathParam Unique identifier of the job.
     */
    private string $jobIdentifierPathParam;

    /**
     * @var string $appId The Intercom defined code of the workspace the company is associated to.
     */
    private string $appId;

    /**
     * @var string $clientId
     */
    private string $clientId;

    /**
     * @var string $jobIdentifier Unique identifier of the job.
     */
    private string $jobIdentifier;

    /**
     * @param array{
     *   jobIdentifierPathParam: string,
     *   appId: string,
     *   clientId: string,
     *   jobIdentifier: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobIdentifierPathParam = $values['jobIdentifierPathParam'];
        $this->appId = $values['appId'];
        $this->clientId = $values['clientId'];
        $this->jobIdentifier = $values['jobIdentifier'];
    }

    /**
     * @return string
     */
    public function getJobIdentifierPathParam(): string
    {
        return $this->jobIdentifierPathParam;
    }

    /**
     * @param string $value
     */
    public function setJobIdentifierPathParam(string $value): self
    {
        $this->jobIdentifierPathParam = $value;
        $this->_setField('jobIdentifierPathParam');
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
        $this->_setField('appId');
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
        $this->_setField('clientId');
        return $this;
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
        $this->_setField('jobIdentifier');
        return $this;
    }
}
