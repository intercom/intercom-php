<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\SubscriptionTypes\Types\SubscriptionType;
use Intercom\Core\Types\ArrayType;

/**
 * A list of subscription type objects.
 */
class SubscriptionTypeList extends JsonSerializableType
{
    /**
     * @var ?'list' $type The type of the object
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<SubscriptionType> $data A list of subscription type objects associated with the workspace .
     */
    #[JsonProperty('data'), ArrayType([SubscriptionType::class])]
    private ?array $data;

    /**
     * @param array{
     *   type?: ?'list',
     *   data?: ?array<SubscriptionType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?'list'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'list' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<SubscriptionType>
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param ?array<SubscriptionType> $value
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
