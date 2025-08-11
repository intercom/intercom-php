<?php

namespace Intercom\DataAttributes\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Data Attributes are metadata used to describe your contact, company and conversation models. These include standard and custom attributes. By using the data attributes endpoint, you can get the global list of attributes for your workspace, as well as create and archive custom attributes.
 */
class DataAttribute extends JsonSerializableType
{
    /**
     * @var 'data_attribute' $type Value is `data_attribute`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?int $id The unique identifier for the data attribute which is given by Intercom. Only available for custom attributes.
     */
    #[JsonProperty('id')]
    private ?int $id;

    /**
     * @var ?value-of<DataAttributeModel> $model Value is `contact` for user/lead attributes and `company` for company attributes.
     */
    #[JsonProperty('model')]
    private ?string $model;

    /**
     * @var string $name Name of the attribute.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $fullName Full name of the attribute. Should match the name unless it's a nested attribute. We can split full_name on `.` to access nested user object values.
     */
    #[JsonProperty('full_name')]
    private string $fullName;

    /**
     * @var string $label Readable name of the attribute (i.e. name you see in the UI)
     */
    #[JsonProperty('label')]
    private string $label;

    /**
     * @var ?string $description Readable description of the attribute.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var value-of<DataAttributeDataType> $dataType The data type of the attribute.
     */
    #[JsonProperty('data_type')]
    private string $dataType;

    /**
     * @var ?array<string> $options List of predefined options for attribute value.
     */
    #[JsonProperty('options'), ArrayType(['string'])]
    private ?array $options;

    /**
     * @var ?bool $apiWritable Can this attribute be updated through API
     */
    #[JsonProperty('api_writable')]
    private ?bool $apiWritable;

    /**
     * @var ?bool $messengerWritable Can this attribute be updated by the Messenger
     */
    #[JsonProperty('messenger_writable')]
    private ?bool $messengerWritable;

    /**
     * @var ?bool $uiWritable Can this attribute be updated in the UI
     */
    #[JsonProperty('ui_writable')]
    private ?bool $uiWritable;

    /**
     * @var ?bool $custom Set to true if this is a CDA
     */
    #[JsonProperty('custom')]
    private ?bool $custom;

    /**
     * @var ?bool $archived Is this attribute archived. (Only applicable to CDAs)
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @var ?int $createdAt The time the attribute was created as a UTC Unix timestamp
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The time the attribute was last updated as a UTC Unix timestamp
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?string $adminId Teammate who created the attribute. Only applicable to CDAs
     */
    #[JsonProperty('admin_id')]
    private ?string $adminId;

    /**
     * @param array{
     *   type: 'data_attribute',
     *   name: string,
     *   fullName: string,
     *   label: string,
     *   dataType: value-of<DataAttributeDataType>,
     *   id?: ?int,
     *   model?: ?value-of<DataAttributeModel>,
     *   description?: ?string,
     *   options?: ?array<string>,
     *   apiWritable?: ?bool,
     *   messengerWritable?: ?bool,
     *   uiWritable?: ?bool,
     *   custom?: ?bool,
     *   archived?: ?bool,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   adminId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->name = $values['name'];
        $this->fullName = $values['fullName'];
        $this->label = $values['label'];
        $this->description = $values['description'] ?? null;
        $this->dataType = $values['dataType'];
        $this->options = $values['options'] ?? null;
        $this->apiWritable = $values['apiWritable'] ?? null;
        $this->messengerWritable = $values['messengerWritable'] ?? null;
        $this->uiWritable = $values['uiWritable'] ?? null;
        $this->custom = $values['custom'] ?? null;
        $this->archived = $values['archived'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->adminId = $values['adminId'] ?? null;
    }

    /**
     * @return 'data_attribute'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'data_attribute' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $value
     */
    public function setId(?int $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<DataAttributeModel>
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param ?value-of<DataAttributeModel> $value
     */
    public function setModel(?string $value = null): self
    {
        $this->model = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $value
     */
    public function setFullName(string $value): self
    {
        $this->fullName = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $value
     */
    public function setLabel(string $value): self
    {
        $this->label = $value;
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
     * @return value-of<DataAttributeDataType>
     */
    public function getDataType(): string
    {
        return $this->dataType;
    }

    /**
     * @param value-of<DataAttributeDataType> $value
     */
    public function setDataType(string $value): self
    {
        $this->dataType = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param ?array<string> $value
     */
    public function setOptions(?array $value = null): self
    {
        $this->options = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getApiWritable(): ?bool
    {
        return $this->apiWritable;
    }

    /**
     * @param ?bool $value
     */
    public function setApiWritable(?bool $value = null): self
    {
        $this->apiWritable = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getMessengerWritable(): ?bool
    {
        return $this->messengerWritable;
    }

    /**
     * @param ?bool $value
     */
    public function setMessengerWritable(?bool $value = null): self
    {
        $this->messengerWritable = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getUiWritable(): ?bool
    {
        return $this->uiWritable;
    }

    /**
     * @param ?bool $value
     */
    public function setUiWritable(?bool $value = null): self
    {
        $this->uiWritable = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCustom(): ?bool
    {
        return $this->custom;
    }

    /**
     * @param ?bool $value
     */
    public function setCustom(?bool $value = null): self
    {
        $this->custom = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getArchived(): ?bool
    {
        return $this->archived;
    }

    /**
     * @param ?bool $value
     */
    public function setArchived(?bool $value = null): self
    {
        $this->archived = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdminId(): ?string
    {
        return $this->adminId;
    }

    /**
     * @param ?string $value
     */
    public function setAdminId(?string $value = null): self
    {
        $this->adminId = $value;
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
