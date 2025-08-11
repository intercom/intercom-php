<?php

namespace Intercom\Unstable\Messages\Requests;

use Intercom\Core\Json\JsonSerializableType;

class GetWhatsAppMessageStatusRequest extends JsonSerializableType
{
    /**
     * @var string $rulesetId The unique identifier for the set of messages to check status for
     */
    private string $rulesetId;

    /**
     * @var ?int $perPage Number of results per page (default 50, max 100)
     */
    private ?int $perPage;

    /**
     * @var ?string $startingAfter Cursor for pagination, used to fetch the next page of results
     */
    private ?string $startingAfter;

    /**
     * @param array{
     *   rulesetId: string,
     *   perPage?: ?int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rulesetId = $values['rulesetId'];
        $this->perPage = $values['perPage'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
    }

    /**
     * @return string
     */
    public function getRulesetId(): string
    {
        return $this->rulesetId;
    }

    /**
     * @param string $value
     */
    public function setRulesetId(string $value): self
    {
        $this->rulesetId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    /**
     * @param ?int $value
     */
    public function setPerPage(?int $value = null): self
    {
        $this->perPage = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStartingAfter(): ?string
    {
        return $this->startingAfter;
    }

    /**
     * @param ?string $value
     */
    public function setStartingAfter(?string $value = null): self
    {
        $this->startingAfter = $value;
        return $this;
    }
}
