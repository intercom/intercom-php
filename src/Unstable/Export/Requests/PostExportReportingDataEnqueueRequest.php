<?php

namespace Intercom\Unstable\Export\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class PostExportReportingDataEnqueueRequest extends JsonSerializableType
{
    /**
     * @var string $datasetId
     */
    #[JsonProperty('dataset_id')]
    private string $datasetId;

    /**
     * @var array<string> $attributeIds
     */
    #[JsonProperty('attribute_ids'), ArrayType(['string'])]
    private array $attributeIds;

    /**
     * @var int $startTime
     */
    #[JsonProperty('start_time')]
    private int $startTime;

    /**
     * @var int $endTime
     */
    #[JsonProperty('end_time')]
    private int $endTime;

    /**
     * @param array{
     *   datasetId: string,
     *   attributeIds: array<string>,
     *   startTime: int,
     *   endTime: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->datasetId = $values['datasetId'];
        $this->attributeIds = $values['attributeIds'];
        $this->startTime = $values['startTime'];
        $this->endTime = $values['endTime'];
    }

    /**
     * @return string
     */
    public function getDatasetId(): string
    {
        return $this->datasetId;
    }

    /**
     * @param string $value
     */
    public function setDatasetId(string $value): self
    {
        $this->datasetId = $value;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getAttributeIds(): array
    {
        return $this->attributeIds;
    }

    /**
     * @param array<string> $value
     */
    public function setAttributeIds(array $value): self
    {
        $this->attributeIds = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @param int $value
     */
    public function setStartTime(int $value): self
    {
        $this->startTime = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getEndTime(): int
    {
        return $this->endTime;
    }

    /**
     * @param int $value
     */
    public function setEndTime(int $value): self
    {
        $this->endTime = $value;
        return $this;
    }
}
