<?php

namespace Intercom\DataExport\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The data export api is used to view all message sent & viewed in a given timeframe.
 */
class DataExport extends JsonSerializableType
{
    /**
     * @var ?string $jobIdentifier The identifier for your job.
     */
    #[JsonProperty('job_identifier')]
    private ?string $jobIdentifier;

    /**
     * @var ?value-of<DataExportStatus> $status The current state of your job.
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $downloadExpiresAt The time after which you will not be able to access the data.
     */
    #[JsonProperty('download_expires_at')]
    private ?string $downloadExpiresAt;

    /**
     * @var ?string $downloadUrl The location where you can download your data.
     */
    #[JsonProperty('download_url')]
    private ?string $downloadUrl;

    /**
     * @param array{
     *   jobIdentifier?: ?string,
     *   status?: ?value-of<DataExportStatus>,
     *   downloadExpiresAt?: ?string,
     *   downloadUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->jobIdentifier = $values['jobIdentifier'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->downloadExpiresAt = $values['downloadExpiresAt'] ?? null;
        $this->downloadUrl = $values['downloadUrl'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getJobIdentifier(): ?string
    {
        return $this->jobIdentifier;
    }

    /**
     * @param ?string $value
     */
    public function setJobIdentifier(?string $value = null): self
    {
        $this->jobIdentifier = $value;
        return $this;
    }

    /**
     * @return ?value-of<DataExportStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<DataExportStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDownloadExpiresAt(): ?string
    {
        return $this->downloadExpiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setDownloadExpiresAt(?string $value = null): self
    {
        $this->downloadExpiresAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }

    /**
     * @param ?string $value
     */
    public function setDownloadUrl(?string $value = null): self
    {
        $this->downloadUrl = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
