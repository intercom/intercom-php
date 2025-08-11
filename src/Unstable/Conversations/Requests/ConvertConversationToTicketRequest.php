<?php

namespace Intercom\Unstable\Conversations\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

class ConvertConversationToTicketRequest extends JsonSerializableType
{
    /**
     * @var int $id The id of the conversation to target
     */
    private int $id;

    /**
     * @var string $ticketTypeId The ID of the type of ticket you want to convert the conversation to
     */
    #[JsonProperty('ticket_type_id')]
    private string $ticketTypeId;

    /**
     * @var ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |null
     * )> $attributes
     */
    #[JsonProperty('attributes'), ArrayType(['string' => new Union(new Union('string', 'null'), 'float', 'bool', ['mixed'])])]
    private ?array $attributes;

    /**
     * @param array{
     *   id: int,
     *   ticketTypeId: string,
     *   attributes?: ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |null
     * )>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->ticketTypeId = $values['ticketTypeId'];
        $this->attributes = $values['attributes'] ?? null;
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
     * @return ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |null
     * )>
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<mixed>
     *   |null
     * )> $value
     */
    public function setAttributes(?array $value = null): self
    {
        $this->attributes = $value;
        return $this;
    }
}
