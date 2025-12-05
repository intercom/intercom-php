<?php

namespace Intercom\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class ConvertConversationToTicketRequest extends JsonSerializableType
{
    /**
     * @var int $conversationId The id of the conversation to target
     */
    private int $conversationId;

    /**
     * @var string $ticketTypeId The ID of the type of ticket you want to convert the conversation to
     */
    #[JsonProperty('ticket_type_id')]
    private string $ticketTypeId;

    /**
     * @var ?array<string, mixed> $attributes
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $attributes;

    /**
     * @param array{
     *   conversationId: int,
     *   ticketTypeId: string,
     *   attributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationId = $values['conversationId'];
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->attributes = $values['attributes'] ?? null;
    }

    /**
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    /**
     * @param int $value
     */
    public function setConversationId(int $value): self
    {
        $this->conversationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTicketTypeId(): string
    {
        return $this->ticketTypeId;
    }

    /**
     * @param string $value
     */
    public function setTicketTypeId(string $value): self
    {
        $this->ticketTypeId = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setAttributes(?array $value = null): self
    {
        $this->attributes = $value;
        return $this;
    }
}
