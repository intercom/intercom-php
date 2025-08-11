<?php

namespace Intercom\Companies\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class CompanyPlan extends JsonSerializableType
{
    /**
     * @var ?'plan' $type Value is always "plan"
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the plan
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of the plan
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @param array{
     *   type?: ?'plan',
     *   id?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return ?'plan'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'plan' $value
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
