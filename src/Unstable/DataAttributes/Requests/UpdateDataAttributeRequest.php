<?php

namespace Intercom\Unstable\DataAttributes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateDataAttributeRequest extends JsonSerializableType
{
    /**
     * @var int $id The data attribute id
     */
    private int $id;

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
     *   id: int,
     *   archived?: ?bool,
     *   description?: ?string,
     *   options?: ?array<string>,
     *   messengerWritable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->archived = $values['archived'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->messengerWritable = $values['messengerWritable'] ?? null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $value
     */
    public function setId(int $value): self
    {
        $this->id = $value;
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
