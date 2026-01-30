<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Date;

/**
 * A workflow export containing the complete workflow configuration.
 */
class WorkflowExport extends JsonSerializableType
{
    /**
     * @var ?string $exportVersion The version of the export format.
     */
    #[JsonProperty('export_version')]
    private ?string $exportVersion;

    /**
     * @var ?DateTime $exportedAt The timestamp when the export was generated.
     */
    #[JsonProperty('exported_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $exportedAt;

    /**
     * @var ?int $appId The workspace identifier.
     */
    #[JsonProperty('app_id')]
    private ?int $appId;

    /**
     * @var ?WorkflowExportWorkflow $workflow The workflow configuration.
     */
    #[JsonProperty('workflow')]
    private ?WorkflowExportWorkflow $workflow;

    /**
     * @param array{
     *   exportVersion?: ?string,
     *   exportedAt?: ?DateTime,
     *   appId?: ?int,
     *   workflow?: ?WorkflowExportWorkflow,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->exportVersion = $values['exportVersion'] ?? null;
        $this->exportedAt = $values['exportedAt'] ?? null;
        $this->appId = $values['appId'] ?? null;
        $this->workflow = $values['workflow'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getExportVersion(): ?string
    {
        return $this->exportVersion;
    }

    /**
     * @param ?string $value
     */
    public function setExportVersion(?string $value = null): self
    {
        $this->exportVersion = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getExportedAt(): ?DateTime
    {
        return $this->exportedAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setExportedAt(?DateTime $value = null): self
    {
        $this->exportedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAppId(): ?int
    {
        return $this->appId;
    }

    /**
     * @param ?int $value
     */
    public function setAppId(?int $value = null): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return ?WorkflowExportWorkflow
     */
    public function getWorkflow(): ?WorkflowExportWorkflow
    {
        return $this->workflow;
    }

    /**
     * @param ?WorkflowExportWorkflow $value
     */
    public function setWorkflow(?WorkflowExportWorkflow $value = null): self
    {
        $this->workflow = $value;
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
