<?php

namespace Intercom\Unstable\Conversations\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\CustomerRequestIntercomUserId;
use Intercom\Unstable\Types\CustomerRequestUserId;
use Intercom\Unstable\Types\CustomerRequestEmail;
use Intercom\Core\Types\Union;

class AttachContactToConversationRequestCustomerUserId extends JsonSerializableType
{
    /**
     * @var string $userId The external_id you have defined for the contact who is being added as a participant.
     */
    #[JsonProperty('user_id')]
    private string $userId;

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
     *   userId: string,
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
        $this->userId = $values['userId'];
        $this->customer = $values['customer'] ?? null;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $value
     */
    public function setUserId(string $value): self
    {
        $this->userId = $value;
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
