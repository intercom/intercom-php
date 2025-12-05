<?php

namespace Intercom\Calls\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class ListCallsWithTranscriptsResponse extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<ListCallsWithTranscriptsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListCallsWithTranscriptsResponseDataItem::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<ListCallsWithTranscriptsResponseDataItem>,
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
     * @return ?array<ListCallsWithTranscriptsResponseDataItem>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<ListCallsWithTranscriptsResponseDataItem> $value
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
