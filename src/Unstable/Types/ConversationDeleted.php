<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * deleted conversation object
 */
class ConversationDeleted extends JsonSerializableType
{
    /**
     * @var ?string $id The unique identifier for the conversation.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?'conversation' $object always conversation
     */
    #[JsonProperty('object')]
    private ?string $object;

    /**
     * @var ?bool $deleted Whether the conversation is deleted or not.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @param array{
     *   id?: ?string,
     *   object?: ?'conversation',
     *   deleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
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
     * @return ?'conversation'
     */
    public function getObject(): ?string
    {
        return $this->object;
    }

    /**
     * @param ?'conversation' $value
     */
    public function setObject(?string $value = null): self
    {
        $this->object = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
