<?php

namespace Intercom\Events\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Events\Types\EventsListRequestFilterUserId;
use Intercom\Events\Types\EventsListRequestFilterIntercomUserId;
use Intercom\Events\Types\EventsListRequestFilterEmail;

class ListEventsRequest extends JsonSerializableType
{
    /**
     * @var (
     *    EventsListRequestFilterUserId
     *   |EventsListRequestFilterIntercomUserId
     *   |EventsListRequestFilterEmail
     * ) $filter
     */
    private EventsListRequestFilterUserId|EventsListRequestFilterIntercomUserId|EventsListRequestFilterEmail $filter;

    /**
     * @var string $type The value must be user
     */
    private string $type;

    /**
     * @var ?bool $summary summary flag
     */
    private ?bool $summary;

    /**
     * @var ?string $userId user_id query parameter
     */
    private ?string $userId;

    /**
     * @var ?string $intercomUserId intercom_user_id query parameter
     */
    private ?string $intercomUserId;

    /**
     * @var ?string $email email query parameter
     */
    private ?string $email;

    /**
     * @var ?int $perPage How many results to display per page. Defaults to 15
     */
    private ?int $perPage;

    /**
     * @param array{
     *   filter: (
     *    EventsListRequestFilterUserId
     *   |EventsListRequestFilterIntercomUserId
     *   |EventsListRequestFilterEmail
     * ),
     *   type: string,
     *   summary?: ?bool,
     *   userId?: ?string,
     *   intercomUserId?: ?string,
     *   email?: ?string,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filter = $values['filter'];
        $this->type = $values['type'];
        $this->summary = $values['summary'] ?? null;
        $this->userId = $values['userId'] ?? null;
        $this->intercomUserId = $values['intercomUserId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return (
     *    EventsListRequestFilterUserId
     *   |EventsListRequestFilterIntercomUserId
     *   |EventsListRequestFilterEmail
     * )
     */
    public function getFilter(): EventsListRequestFilterUserId|EventsListRequestFilterIntercomUserId|EventsListRequestFilterEmail
    {
        return $this->filter;
    }

    /**
     * @param (
     *    EventsListRequestFilterUserId
     *   |EventsListRequestFilterIntercomUserId
     *   |EventsListRequestFilterEmail
     * ) $value
     */
    public function setFilter(EventsListRequestFilterUserId|EventsListRequestFilterIntercomUserId|EventsListRequestFilterEmail $value): self
    {
        $this->filter = $value;
        $this->_setField('filter');
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
        $this->_setField('type');
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
        $this->_setField('summary');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param ?string $value
     */
    public function setUserId(?string $value = null): self
    {
        $this->userId = $value;
        $this->_setField('userId');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIntercomUserId(): ?string
    {
        return $this->intercomUserId;
    }

    /**
     * @param ?string $value
     */
    public function setIntercomUserId(?string $value = null): self
    {
        $this->intercomUserId = $value;
        $this->_setField('intercomUserId');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
        $this->_setField('email');
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
        $this->_setField('perPage');
        return $this;
    }
}
