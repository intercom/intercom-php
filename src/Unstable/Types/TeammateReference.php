<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * A reference to a teammate (admin, team, or bot)
 */
class TeammateReference extends JsonSerializableType
{
    /**
     * @var value-of<TeammateReferenceType> $type The type of teammate
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var int $id The unique identifier of the teammate
     */
    #[JsonProperty('id')]
    private int $id;

    /**
     * @var string $name The display name of the teammate
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $email The email address of the teammate (optional for teams/bots)
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @param array{
     *   type: value-of<TeammateReferenceType>,
     *   id: int,
     *   name: string,
     *   email?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->email = $values['email'] ?? null;
    }

    /**
     * @return value-of<TeammateReferenceType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<TeammateReferenceType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
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
