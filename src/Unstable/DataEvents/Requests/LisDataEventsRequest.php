<?php

namespace Intercom\Unstable\DataEvents\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterUserId;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterIntercomUserId;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterEmail;

class LisDataEventsRequest extends JsonSerializableType
{
    /**
     * @var (
     *    LisDataEventsRequestFilterUserId
     *   |LisDataEventsRequestFilterIntercomUserId
     *   |LisDataEventsRequestFilterEmail
     * ) $filter
     */
    private LisDataEventsRequestFilterUserId|LisDataEventsRequestFilterIntercomUserId|LisDataEventsRequestFilterEmail $filter;

    /**
     * @var string $type The value must be user
     */
    private string $type;

    /**
     * @var ?bool $summary summary flag
     */
    private ?bool $summary;

    /**
     * @param array{
     *   filter: (
     *    LisDataEventsRequestFilterUserId
     *   |LisDataEventsRequestFilterIntercomUserId
     *   |LisDataEventsRequestFilterEmail
     * ),
     *   type: string,
     *   summary?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filter = $values['filter'];
        $this->type = $values['type'];
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return (
     *    LisDataEventsRequestFilterUserId
     *   |LisDataEventsRequestFilterIntercomUserId
     *   |LisDataEventsRequestFilterEmail
     * )
     */
    public function getFilter(): LisDataEventsRequestFilterUserId|LisDataEventsRequestFilterIntercomUserId|LisDataEventsRequestFilterEmail
    {
        return $this->filter;
    }

    /**
     * @param (
     *    LisDataEventsRequestFilterUserId
     *   |LisDataEventsRequestFilterIntercomUserId
     *   |LisDataEventsRequestFilterEmail
     * ) $value
     */
    public function setFilter(LisDataEventsRequestFilterUserId|LisDataEventsRequestFilterIntercomUserId|LisDataEventsRequestFilterEmail $value): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSummary(): ?bool
    {
        return $this->summary;
    }

    /**
     * @param ?bool $value
     */
    public function setSummary(?bool $value = null): self
    {
        $this->summary = $value;
        return $this;
    }
}
