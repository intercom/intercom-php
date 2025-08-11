<?php

namespace Intercom\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\DataAttributes\Types\UpdateDataAttributeRequestOptionsItem;
use Intercom\Core\Types\ArrayType;

class UpdateDataAttributeRequest extends JsonSerializableType
{
    /**
     * @var string $dataAttributeId The data attribute id
     */
    private string $dataAttributeId;

    /**
     * @var ?bool $archived Whether the attribute is to be archived or not.
     */
    #[JsonProperty('archived')]
    private ?bool $archived;

    /**
     * @var ?string $description The readable description you see in the UI for the attribute.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?array<UpdateDataAttributeRequestOptionsItem> $options To create list attributes. Provide a set of hashes with `value` as the key of the options you want to make. `data_type` must be `string`.
     */
    #[JsonProperty('options'), ArrayType([UpdateDataAttributeRequestOptionsItem::class])]
    private ?array $options;

    /**
     * @var ?bool $messengerWritable Can this attribute be updated by the Messenger
     */
    #[JsonProperty('messenger_writable')]
    private ?bool $messengerWritable;

    /**
     * @param array{
     *   dataAttributeId: string,
     *   archived?: ?bool,
     *   description?: ?string,
     *   options?: ?array<UpdateDataAttributeRequestOptionsItem>,
     *   messengerWritable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dataAttributeId = $values['dataAttributeId'];
        $this->archived = $values['archived'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->messengerWritable = $values['messengerWritable'] ?? null;
    }

    /**
     * @return string
     */
    public function getDataAttributeId(): string
    {
        return $this->dataAttributeId;
    }

    /**
     * @param string $value
     */
    public function setDataAttributeId(string $value): self
    {
        $this->dataAttributeId = $value;
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
     * @return ?array<UpdateDataAttributeRequestOptionsItem>
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param ?array<UpdateDataAttributeRequestOptionsItem> $value
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
