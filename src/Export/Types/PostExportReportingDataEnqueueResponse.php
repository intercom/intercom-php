<?php

namespace Intercom\Export\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class PostExportReportingDataEnqueueResponse extends JsonSerializableType
{
    /**
     * @var ?string $jobIdentifier
     */
    #[JsonProperty('job_identifier')]
    private ?string $jobIdentifier;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $downloadUrl
     */
    #[JsonProperty('download_url')]
    private ?string $downloadUrl;

    /**
     * @var ?string $downloadExpiresAt
     */
    #[JsonProperty('download_expires_at')]
    private ?string $downloadExpiresAt;

    /**
     * @param array{
     *   jobIdentifier?: ?string,
     *   status?: ?string,
     *   downloadUrl?: ?string,
     *   downloadExpiresAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->jobIdentifier = $values['jobIdentifier'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->downloadUrl = $values['downloadUrl'] ?? null;
        $this->downloadExpiresAt = $values['downloadExpiresAt'] ?? null;
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
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
