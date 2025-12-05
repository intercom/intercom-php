<?php

namespace Intercom\Export\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class GetExportReportingDataGetDatasetsResponseDataItem extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $defaultTimeAttributeId
     */
    #[JsonProperty('default_time_attribute_id')]
    private ?string $defaultTimeAttributeId;

    /**
     * @var ?array<GetExportReportingDataGetDatasetsResponseDataItemAttributesItem> $attributes
     */
    #[JsonProperty('attributes'), ArrayType([GetExportReportingDataGetDatasetsResponseDataItemAttributesItem::class])]
    private ?array $attributes;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   description?: ?string,
     *   defaultTimeAttributeId?: ?string,
     *   attributes?: ?array<GetExportReportingDataGetDatasetsResponseDataItemAttributesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->defaultTimeAttributeId = $values['defaultTimeAttributeId'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDefaultTimeAttributeId(): ?string
    {
        return $this->defaultTimeAttributeId;
    }

    /**
     * @param ?string $value
     */
    public function setDefaultTimeAttributeId(?string $value = null): self
    {
        $this->defaultTimeAttributeId = $value;
        return $this;
    }

    /**
     * @return ?array<GetExportReportingDataGetDatasetsResponseDataItemAttributesItem>
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param ?array<GetExportReportingDataGetDatasetsResponseDataItemAttributesItem> $value
     */
    public function setAttributes(?array $value = null): self
    {
        $this->attributes = $value;
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
