<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Target times configured for the SLA (in seconds)
 */
class ConversationSlaAppliedByWorkflowSlaDefinition extends JsonSerializableType
{
    /**
     * @var ?int $firstReplyTime First response time target in seconds
     */
    #[JsonProperty('first_reply_time')]
    private ?int $firstReplyTime;

    /**
     * @var ?int $nextReplyTime Next reply time target in seconds
     */
    #[JsonProperty('next_reply_time')]
    private ?int $nextReplyTime;

    /**
     * @var ?int $resolutionTime Resolution time target in seconds
     */
    #[JsonProperty('resolution_time')]
    private ?int $resolutionTime;

    /**
     * @var ?int $timeToClose Time to close target in seconds
     */
    #[JsonProperty('time_to_close')]
    private ?int $timeToClose;

    /**
     * @param array{
     *   firstReplyTime?: ?int,
     *   nextReplyTime?: ?int,
     *   resolutionTime?: ?int,
     *   timeToClose?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->firstReplyTime = $values['firstReplyTime'] ?? null;
        $this->nextReplyTime = $values['nextReplyTime'] ?? null;
        $this->resolutionTime = $values['resolutionTime'] ?? null;
        $this->timeToClose = $values['timeToClose'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getFirstReplyTime(): ?int
    {
        return $this->firstReplyTime;
    }

    /**
     * @param ?int $value
     */
    public function setFirstReplyTime(?int $value = null): self
    {
        $this->firstReplyTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getNextReplyTime(): ?int
    {
        return $this->nextReplyTime;
    }

    /**
     * @param ?int $value
     */
    public function setNextReplyTime(?int $value = null): self
    {
        $this->nextReplyTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getResolutionTime(): ?int
    {
        return $this->resolutionTime;
    }

    /**
     * @param ?int $value
     */
    public function setResolutionTime(?int $value = null): self
    {
        $this->resolutionTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getTimeToClose(): ?int
    {
        return $this->timeToClose;
    }

    /**
     * @param ?int $value
     */
    public function setTimeToClose(?int $value = null): self
    {
        $this->timeToClose = $value;
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
