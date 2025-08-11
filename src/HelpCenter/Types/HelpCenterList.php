<?php

namespace Intercom\HelpCenter\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * A list of Help Centers belonging to the App
 */
class HelpCenterList extends JsonSerializableType
{
    /**
     * @var 'list' $type The type of the object - `list`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var array<HelpCenter> $data An array of Help Center objects
     */
    #[JsonProperty('data'), ArrayType([HelpCenter::class])]
    private array $data;

    /**
     * @param array{
     *   type: 'list',
     *   data: array<HelpCenter>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->data = $values['data'];
    }

    /**
     * @return 'list'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'list' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return array<HelpCenter>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array<HelpCenter> $value
     */
    public function setData(array $value): self
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
