<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Response returned when an object is deleted
 */
class VisitorDeletedObject extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the visitor which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'visitor' $type The type of object which was deleted
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $userId Automatically generated identifier for the Visitor.
     */
    #[JsonProperty('user_id')]
    private ?string $userId;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?'visitor',
     *   userId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->userId = $values['userId'] ?? null;
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
     * @return ?'visitor'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'visitor' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param ?string $value
     */
    public function setUserId(?string $value = null): self
    {
        $this->userId = $value;
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
