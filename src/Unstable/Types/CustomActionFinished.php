<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains details about final status of the completed action for conversation part type <code>custom_action_finished</code>.
 */
class CustomActionFinished extends JsonSerializableType
{
    /**
     * @var ?CustomActionFinishedAction $action
     */
    #[JsonProperty('action')]
    private ?CustomActionFinishedAction $action;

    /**
     * @param array{
     *   action?: ?CustomActionFinishedAction,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
    }

    /**
     * @return ?CustomActionFinishedAction
     */
    public function getAction(): ?CustomActionFinishedAction
    {
        return $this->action;
    }

    /**
     * @param ?CustomActionFinishedAction $value
     */
    public function setAction(?CustomActionFinishedAction $value = null): self
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
