<?php

namespace Intercom\Export\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class GetExportReportingDataGetDatasetsResponse extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<GetExportReportingDataGetDatasetsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([GetExportReportingDataGetDatasetsResponseDataItem::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<GetExportReportingDataGetDatasetsResponseDataItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<GetExportReportingDataGetDatasetsResponseDataItem>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<GetExportReportingDataGetDatasetsResponseDataItem> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
