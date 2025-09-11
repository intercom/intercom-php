<?php

namespace Intercom\DataExport\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DownloadReportingDataExportRequest extends JsonSerializableType
{
    /**
     * @var string $jobIdentifier
     */
    private string $jobIdentifier;

    /**
     * @var string $appId
     */
    private string $appId;

    /**
     * @param array{
     *   jobIdentifier: string,
     *   appId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobIdentifier = $values['jobIdentifier'];
        $this->appId = $values['appId'];
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
}
