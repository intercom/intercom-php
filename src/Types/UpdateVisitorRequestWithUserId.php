<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateVisitorRequestWithUserId extends JsonSerializableType
{
    /**
     * @var string $userId A unique identified for the visitor which is given by you.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @var ?string $name The visitor's name.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?array<string, string> $customAttributes The custom attributes which are set for the visitor.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'string'])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   userId: string,
     *   name?: ?string,
     *   customAttributes?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->userId = $values['userId'];
        $this->name = $values['name'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
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
     * @return ?array<string, string>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, string> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
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
