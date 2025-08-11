<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;

class RetrieveConversationRequest extends JsonSerializableType
{
    /**
     * @var int $id The id of the conversation to target
     */
    private int $id;

    /**
     * @var ?string $displayAs Set to plaintext to retrieve conversation messages in plain text.
     */
    private ?string $displayAs;

    /**
     * @param array{
     *   id: int,
     *   displayAs?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->displayAs = $values['displayAs'] ?? null;
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
     * @return ?string
     */
    public function getDisplayAs(): ?string
    {
        return $this->displayAs;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayAs(?string $value = null): self
    {
        $this->displayAs = $value;
        return $this;
    }
}
