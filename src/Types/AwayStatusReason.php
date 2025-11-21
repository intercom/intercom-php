<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AwayStatusReason extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the away status reason
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $label The display text for the away status reason
     */
    #[JsonProperty('label')]
    private ?string $label;

    /**
     * @var ?string $emoji The emoji associated with the status reason
     */
    #[JsonProperty('emoji')]
    private ?string $emoji;

    /**
     * @var ?int $order The display order of the status reason
     */
    #[JsonProperty('order')]
    private ?int $order;

    /**
     * @var ?bool $deleted Whether the status reason has been soft deleted
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @var ?int $createdAt The Unix timestamp when the status reason was created
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt The Unix timestamp when the status reason was last updated
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   label?: ?string,
     *   emoji?: ?string,
     *   order?: ?int,
     *   deleted?: ?bool,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->emoji = $values['emoji'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param ?string $value
     */
    public function setLabel(?string $value = null): self
    {
        $this->label = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param ?string $value
     */
    public function setEmoji(?string $value = null): self
    {
        $this->emoji = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param ?int $value
     */
    public function setOrder(?int $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param ?bool $value
     */
    public function setDeleted(?bool $value = null): self
    {
        $this->deleted = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
