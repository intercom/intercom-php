<?php

namespace Intercom\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\DataAttributes\Types\CreateDataAttributeRequestModel;
use Intercom\DataAttributes\Types\CreateDataAttributeRequestDataType;
use Intercom\Core\Types\ArrayType;

class CreateDataAttributeRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the data attribute.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var value-of<CreateDataAttributeRequestModel> $model The model that the data attribute belongs to.
     */
    #[JsonProperty('model')]
    private string $model;

    /**
     * @var value-of<CreateDataAttributeRequestDataType> $dataType The type of data stored for this attribute.
     */
    #[JsonProperty('data_type')]
    private string $dataType;

    /**
     * @var ?string $description The readable description you see in the UI for the attribute.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?array<string> $options To create list attributes. Provide a set of hashes with `value` as the key of the options you want to make. `data_type` must be `string`.
     */
    #[JsonProperty('options'), ArrayType(['string'])]
    private ?array $options;

    /**
     * @var ?bool $messengerWritable Can this attribute be updated by the Messenger
     */
    #[JsonProperty('messenger_writable')]
    private ?bool $messengerWritable;

    /**
     * @param array{
     *   name: string,
     *   model: value-of<CreateDataAttributeRequestModel>,
     *   dataType: value-of<CreateDataAttributeRequestDataType>,
     *   description?: ?string,
     *   options?: ?array<string>,
     *   messengerWritable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->model = $values['model'];
        $this->dataType = $values['dataType'];
        $this->description = $values['description'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->messengerWritable = $values['messengerWritable'] ?? null;
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
     * @return value-of<CreateDataAttributeRequestModel>
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param value-of<CreateDataAttributeRequestModel> $value
     */
    public function setModel(string $value): self
    {
        $this->model = $value;
        return $this;
    }

    /**
     * @return value-of<CreateDataAttributeRequestDataType>
     */
    public function getDataType(): string
    {
        return $this->dataType;
    }

    /**
     * @param value-of<CreateDataAttributeRequestDataType> $value
     */
    public function setDataType(string $value): self
    {
        $this->dataType = $value;
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
}
