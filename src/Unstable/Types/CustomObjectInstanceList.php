<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\CustomObjectInstances\Types\CustomObjectInstance;
use Intercom\Core\Types\ArrayType;
use Intercom\Core\Types\Union;

/**
 * The list of associated custom object instances for a given reference attribute on the parent object.
 */
class CustomObjectInstanceList extends JsonSerializableType
{
    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<?CustomObjectInstance> $instances The list of associated custom object instances for a given reference attribute on the parent object.
     */
    #[JsonProperty('instances'), ArrayType([new Union(CustomObjectInstance::class, 'null')])]
    private ?array $instances;

    /**
     * @param array{
     *   type?: ?string,
     *   instances?: ?array<?CustomObjectInstance>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->instances = $values['instances'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<?CustomObjectInstance>
     */
    public function getInstances(): ?array
    {
        return $this->instances;
    }

    /**
     * @param ?array<?CustomObjectInstance> $value
     */
    public function setInstances(?array $value = null): self
    {
        $this->instances = $value;
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
