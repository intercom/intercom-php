<?php

namespace Intercom\Unstable\Macros\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use DateTime;
use Intercom\Core\Types\Date;
use Intercom\Core\Types\ArrayType;

/**
 * A macro is a pre-defined response template (saved reply) that can be used to quickly reply to conversations.
 */
class Macro extends JsonSerializableType
{
    /**
     * @var ?'macro' $type String representing the object's type. Always has the value `macro`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the macro.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the macro.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $body The body of the macro in HTML format with placeholders transformed to XML-like format.
     */
    #[JsonProperty('body')]
    private ?string $body;

    /**
     * @var ?string $bodyText The plain text version of the macro body with original Intercom placeholder format.
     */
    #[JsonProperty('body_text')]
    private ?string $bodyText;

    /**
     * @var ?DateTime $createdAt The time the macro was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt The time the macro was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    private ?DateTime $updatedAt;

    /**
     * @var ?value-of<MacroVisibleTo> $visibleTo Who can view this macro.
     */
    #[JsonProperty('visible_to')]
    private ?string $visibleTo;

    /**
     * @var ?array<string> $visibleToTeamIds The team IDs that can view this macro when visible_to is set to specific_teams.
     */
    #[JsonProperty('visible_to_team_ids'), ArrayType(['string'])]
    private ?array $visibleToTeamIds;

    /**
     * @var ?array<value-of<MacroAvailableOnItem>> $availableOn Where the macro is available for use.
     */
    #[JsonProperty('available_on'), ArrayType(['string'])]
    private ?array $availableOn;

    /**
     * @param array{
     *   type?: ?'macro',
     *   id?: ?string,
     *   name?: ?string,
     *   body?: ?string,
     *   bodyText?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   visibleTo?: ?value-of<MacroVisibleTo>,
     *   visibleToTeamIds?: ?array<string>,
     *   availableOn?: ?array<value-of<MacroAvailableOnItem>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->bodyText = $values['bodyText'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->visibleTo = $values['visibleTo'] ?? null;
        $this->visibleToTeamIds = $values['visibleToTeamIds'] ?? null;
        $this->availableOn = $values['availableOn'] ?? null;
    }

    /**
     * @return ?'macro'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'macro' $value
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
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param ?string $value
     */
    public function setBody(?string $value = null): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }

    /**
     * @param ?string $value
     */
    public function setBodyText(?string $value = null): self
    {
        $this->bodyText = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setCreatedAt(?DateTime $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param ?DateTime $value
     */
    public function setUpdatedAt(?DateTime $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<MacroVisibleTo>
     */
    public function getVisibleTo(): ?string
    {
        return $this->visibleTo;
    }

    /**
     * @param ?value-of<MacroVisibleTo> $value
     */
    public function setVisibleTo(?string $value = null): self
    {
        $this->visibleTo = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getVisibleToTeamIds(): ?array
    {
        return $this->visibleToTeamIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setVisibleToTeamIds(?array $value = null): self
    {
        $this->visibleToTeamIds = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<MacroAvailableOnItem>>
     */
    public function getAvailableOn(): ?array
    {
        return $this->availableOn;
    }

    /**
     * @param ?array<value-of<MacroAvailableOnItem>> $value
     */
    public function setAvailableOn(?array $value = null): self
    {
        $this->availableOn = $value;
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
