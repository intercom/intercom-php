<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about name of the action that was initiated for conversation part type <code>custom_action_started</code>.
 */
class CustomActionStarted extends JsonSerializableType
{
    /**
     * @var ?CustomActionStartedAction $action
     */
    #[JsonProperty('action')]
    private ?CustomActionStartedAction $action;

    /**
     * @param array{
     *   action?: ?CustomActionStartedAction,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
    }

    /**
     * @return ?CustomActionStartedAction
     */
    public function getAction(): ?CustomActionStartedAction
    {
        return $this->action;
    }

    /**
     * @param ?CustomActionStartedAction $value
     */
    public function setAction(?CustomActionStartedAction $value = null): self
    {
        $this->action = $value;
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
