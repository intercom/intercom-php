<?php

namespace Intercom\Unstable\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class WhatsappMessageStatusList extends JsonSerializableType
{
    /**
     * @var 'list' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $rulesetId The provided ruleset ID
     */
    #[JsonProperty('ruleset_id')]
    private string $rulesetId;

    /**
     * @var WhatsappMessageStatusListPages $pages
     */
    #[JsonProperty('pages')]
    private WhatsappMessageStatusListPages $pages;

    /**
     * @var int $totalCount Total number of events
     */
    #[JsonProperty('total_count')]
    private int $totalCount;

    /**
     * @var array<WhatsappMessageStatusListEventsItem> $events
     */
    #[JsonProperty('events'), ArrayType([WhatsappMessageStatusListEventsItem::class])]
    private array $events;

    /**
     * @param array{
     *   type: 'list',
     *   rulesetId: string,
     *   pages: WhatsappMessageStatusListPages,
     *   totalCount: int,
     *   events: array<WhatsappMessageStatusListEventsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->rulesetId = $values['rulesetId'];
        $this->pages = $values['pages'];
        $this->totalCount = $values['totalCount'];
        $this->events = $values['events'];
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
     * @return WhatsappMessageStatusListPages
     */
    public function getPages(): WhatsappMessageStatusListPages
    {
        return $this->pages;
    }

    /**
     * @param WhatsappMessageStatusListPages $value
     */
    public function setPages(WhatsappMessageStatusListPages $value): self
    {
        $this->pages = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param int $value
     */
    public function setTotalCount(int $value): self
    {
        $this->totalCount = $value;
        return $this;
    }

    /**
     * @return array<WhatsappMessageStatusListEventsItem>
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param array<WhatsappMessageStatusListEventsItem> $value
     */
    public function setEvents(array $value): self
    {
        $this->events = $value;
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
