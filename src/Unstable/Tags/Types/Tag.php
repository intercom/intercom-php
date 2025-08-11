<?php

namespace Intercom\Unstable\Tags\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\Reference;

/**
 * A tag allows you to label your contacts, companies, and conversations and list them using that tag.
 */
class Tag extends JsonSerializableType
{
    /**
     * @var ?string $type value is "tag"
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the tag
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the tag
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?int $appliedAt The time when the tag was applied to the object
     */
    #[JsonProperty('applied_at')]
    private ?int $appliedAt;

    /**
     * @var ?Reference $appliedBy
     */
    #[JsonProperty('applied_by')]
    private ?Reference $appliedBy;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   appliedAt?: ?int,
     *   appliedBy?: ?Reference,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->appliedAt = $values['appliedAt'] ?? null;
        $this->appliedBy = $values['appliedBy'] ?? null;
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
     * @return ?int
     */
    public function getAppliedAt(): ?int
    {
        return $this->appliedAt;
    }

    /**
     * @param ?int $value
     */
    public function setAppliedAt(?int $value = null): self
    {
        $this->appliedAt = $value;
        return $this;
    }

    /**
     * @return ?Reference
     */
    public function getAppliedBy(): ?Reference
    {
        return $this->appliedBy;
    }

    /**
     * @param ?Reference $value
     */
    public function setAppliedBy(?Reference $value = null): self
    {
        $this->appliedBy = $value;
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
