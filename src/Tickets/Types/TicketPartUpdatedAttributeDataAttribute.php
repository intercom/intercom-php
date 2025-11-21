<?php

namespace Intercom\Tickets\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Information about the attribute that was updated.
 */
class TicketPartUpdatedAttributeDataAttribute extends JsonSerializableType
{
    /**
     * @var 'attribute' $type The type of the object. Always 'attribute'.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The unique identifier of the attribute.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $label The human-readable name of the attribute.
     */
    #[JsonProperty('label')]
    private string $label;

    /**
     * @param array{
     *   type: 'attribute',
     *   id: string,
     *   label: string,
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
     * @return 'attribute'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'attribute' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $value
     */
    public function setLabel(string $value): self
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
