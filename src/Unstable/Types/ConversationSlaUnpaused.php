<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * Contains basic SLA information when unpaused for conversation part type <code>conversation_sla_unpaused</code>.
 */
class ConversationSlaUnpaused extends JsonSerializableType
{
    /**
     * @var ?string $slaName Name of the SLA being unpaused
     */
    #[JsonProperty('sla_name')]
    private ?string $slaName;

    /**
     * @param array{
     *   slaName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->slaName = $values['slaName'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSlaName(): ?string
    {
        return $this->slaName;
    }

    /**
     * @param ?string $value
     */
    public function setSlaName(?string $value = null): self
    {
        $this->slaName = $value;
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
