<?php

namespace Intercom\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DownloadReportingDataExportRequest extends JsonSerializableType
{
    /**
     * @var string $jobIdentifierPathParam
     */
    private string $jobIdentifierPathParam;

    /**
     * @var string $appId
     */
    private string $appId;

    /**
     * @var string $jobIdentifier
     */
    private string $jobIdentifier;

    /**
     * @var 'application/octet-stream' $accept Required header for downloading the export file
     */
    private string $accept;

    /**
     * @param array{
     *   jobIdentifierPathParam: string,
     *   appId: string,
     *   jobIdentifier: string,
     *   accept: 'application/octet-stream',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobIdentifierPathParam = $values['jobIdentifierPathParam'];
        $this->appId = $values['appId'];
        $this->jobIdentifier = $values['jobIdentifier'];
        $this->accept = $values['accept'];
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

    /**
     * @return 'application/octet-stream'
     */
    public function getAccept(): string
    {
        return $this->accept;
    }

    /**
     * @param 'application/octet-stream' $value
     */
    public function setAccept(string $value): self
    {
        $this->accept = $value;
        $this->_setField('accept');
        return $this;
    }
}
