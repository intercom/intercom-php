<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Tickets\Types\TicketType;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * A list of ticket types associated with a given workspace.
 */
class TicketTypeList extends JsonSerializableType
{
    /**
     * @var ?string $type String representing the object's type. Always has the value `list`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?TicketType> $data A list of ticket_types associated with a given workspace.
     */
    #[JsonProperty('data'), ArrayType([new Union(TicketType::class, 'null')])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?string,
     *   data?: ?array<?TicketType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
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
     * @return ?array<?TicketType>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<?TicketType> $value
     */
    public function setData(?array $value = null): self
    {
        $this->data = $value;
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
