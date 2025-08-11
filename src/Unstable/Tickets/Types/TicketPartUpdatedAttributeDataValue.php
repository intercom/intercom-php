<?php

namespace Intercom\Unstable\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\Union;

/**
 * The new value of the attribute.
 */
class TicketPartUpdatedAttributeDataValue extends JsonSerializableType
{
    /**
     * @var 'value' $type The type of the object. Always 'value'.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var (
     *    string
     *   |array<int>
     *   |null
     * ) $id
     */
    #[JsonProperty('id'), Union(new Union('string', 'null'), ['integer'])]
    private string|array|null $id;

    /**
     * @var (
     *    string
     *   |array<string>
     * ) $label
     */
    #[JsonProperty('label'), Union('string', ['string'])]
    private string|array $label;

    /**
     * @param array{
     *   type: 'value',
     *   id: (
     *    string
     *   |array<int>
     *   |null
     * ),
     *   label: (
     *    string
     *   |array<string>
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->label = $values['label'];
    }

    /**
     * @return 'value'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'value' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return (
     *    string
     *   |array<int>
     *   |null
     * )
     */
    public function getId(): string|array|null
    {
        return $this->id;
    }

    /**
     * @param (
     *    string
     *   |array<int>
     *   |null
     * ) $value
     */
    public function setId(string|array|null $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return (
     *    string
     *   |array<string>
     * )
     */
    public function getLabel(): string|array
    {
        return $this->label;
    }

    /**
     * @param (
     *    string
     *   |array<string>
     * ) $value
     */
    public function setLabel(string|array $value): self
    {
        $this->label = $value;
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
