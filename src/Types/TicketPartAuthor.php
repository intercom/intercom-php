<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The author that wrote or triggered the part. Can be a bot, admin, team or user.
 */
class TicketPartAuthor extends JsonSerializableType
{
    /**
     * @var ?value-of<TicketPartAuthorType> $type The type of the author
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the author
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the author
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $email The email of the author
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @param array{
     *   type?: ?value-of<TicketPartAuthorType>,
     *   id?: ?string,
     *   name?: ?string,
     *   email?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
    }

    /**
     * @return ?value-of<TicketPartAuthorType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<TicketPartAuthorType> $value
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
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
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
