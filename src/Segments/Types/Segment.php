<?php

namespace Intercom\Segments\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A segment is a group of your contacts defined by the rules that you set.
 */
class Segment extends JsonSerializableType
{
    /**
     * @var 'segment' $type The type of object.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The unique identifier representing the segment.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $name The name of the segment.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var int $createdAt The time the segment was created.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $updatedAt The time the segment was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var value-of<SegmentPersonType> $personType Type of the contact: contact (lead) or user.
     */
    #[JsonProperty('person_type')]
    private string $personType;

    /**
     * @var ?int $count The number of items in the user segment. It's returned when `include_count=true` is included in the request.
     */
    #[JsonProperty('count')]
    private ?int $count;

    /**
     * @param array{
     *   type: 'segment',
     *   id: string,
     *   name: string,
     *   createdAt: int,
     *   personType: value-of<SegmentPersonType>,
     *   updatedAt?: ?int,
     *   count?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->personType = $values['personType'];
        $this->count = $values['count'] ?? null;
    }

    /**
     * @return 'segment'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'segment' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
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
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
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
     * @return value-of<SegmentPersonType>
     */
    public function getPersonType(): string
    {
        return $this->personType;
    }

    /**
     * @param value-of<SegmentPersonType> $value
     */
    public function setPersonType(string $value): self
    {
        $this->personType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param ?int $value
     */
    public function setCount(?int $value = null): self
    {
        $this->count = $value;
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
