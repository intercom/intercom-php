<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The request payload for creating a ticket type.
 *   You can copy the `icon` property for your ticket type from [Twemoji Cheatsheet](https://twemoji-cheatsheet.vercel.app/)
 */
class CreateTicketTypeRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the ticket type.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $description The description of the ticket type.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?value-of<CreateTicketTypeRequestCategory> $category Category of the Ticket Type.
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @var ?string $icon The icon of the ticket type.
     */
    #[JsonProperty('icon')]
    private ?string $icon;

    /**
     * @var ?bool $isInternal Whether the tickets associated with this ticket type are intended for internal use only or will be shared with customers. This is currently a limited attribute.
     */
    #[JsonProperty('is_internal')]
    private ?bool $isInternal;

    /**
     * @param array{
     *   name: string,
     *   description?: ?string,
     *   category?: ?value-of<CreateTicketTypeRequestCategory>,
     *   icon?: ?string,
     *   isInternal?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->icon = $values['icon'] ?? null;
        $this->isInternal = $values['isInternal'] ?? null;
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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?value-of<CreateTicketTypeRequestCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<CreateTicketTypeRequestCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param ?string $value
     */
    public function setIcon(?string $value = null): self
    {
        $this->icon = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }

    /**
     * @param ?bool $value
     */
    public function setIsInternal(?bool $value = null): self
    {
        $this->isInternal = $value;
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
