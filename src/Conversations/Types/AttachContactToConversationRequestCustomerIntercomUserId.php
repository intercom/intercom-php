<?php

namespace Intercom\Conversations\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\CustomerRequestIntercomUserId;
use Intercom\Types\CustomerRequestUserId;
use Intercom\Types\CustomerRequestEmail;
use Intercom\Core\Types\Union;

class AttachContactToConversationRequestCustomerIntercomUserId extends JsonSerializableType
{
    /**
     * @var string $intercomUserId The identifier for the contact as given by Intercom.
     */
    #[JsonProperty('intercom_user_id')]
    private string $intercomUserId;

    /**
     * @var (
     *    CustomerRequestIntercomUserId
     *   |CustomerRequestUserId
     *   |CustomerRequestEmail
     * )|null $customer
     */
    #[JsonProperty('customer'), Union(CustomerRequestIntercomUserId::class, CustomerRequestUserId::class, CustomerRequestEmail::class, 'null')]
    private CustomerRequestIntercomUserId|CustomerRequestUserId|CustomerRequestEmail|null $customer;

    /**
     * @param array{
     *   intercomUserId: string,
     *   customer?: (
     *    CustomerRequestIntercomUserId
     *   |CustomerRequestUserId
     *   |CustomerRequestEmail
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->intercomUserId = $values['intercomUserId'];
        $this->customer = $values['customer'] ?? null;
    }

    /**
     * @return string
     */
    public function getIntercomUserId(): string
    {
        return $this->intercomUserId;
    }

    /**
     * @param string $value
     */
    public function setIntercomUserId(string $value): self
    {
        $this->intercomUserId = $value;
        return $this;
    }

    /**
     * @return (
     *    CustomerRequestIntercomUserId
     *   |CustomerRequestUserId
     *   |CustomerRequestEmail
     * )|null
     */
    public function getCustomer(): CustomerRequestIntercomUserId|CustomerRequestUserId|CustomerRequestEmail|null
    {
        return $this->customer;
    }

    /**
     * @param (
     *    CustomerRequestIntercomUserId
     *   |CustomerRequestUserId
     *   |CustomerRequestEmail
     * )|null $value
     */
    public function setCustomer(CustomerRequestIntercomUserId|CustomerRequestUserId|CustomerRequestEmail|null $value = null): self
    {
        $this->customer = $value;
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
