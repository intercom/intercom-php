<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The event object enables Intercom to know more about the actions that took place in your app. Currently, you can only tell us when an app's flow has been completed.
 */
class Event extends JsonSerializableType
{
    /**
     * @var 'completed' $type What action took place. The only value currently accepted is `completed`.
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @param array{
     *   type: 'completed',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }

    /**
     * @return 'completed'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'completed' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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
