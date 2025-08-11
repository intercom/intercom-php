<?php

namespace Intercom\Unstable\Conversations\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\CustomerRequestIntercomUserId;
use Intercom\Unstable\Types\CustomerRequestUserId;
use Intercom\Unstable\Types\CustomerRequestEmail;
use Intercom\Core\Types\Union;

class AttachContactToConversationRequestCustomerCustomer extends JsonSerializableType
{
    /**
     * @var string $email The email you have defined for the contact who is being added as a participant.
     */
    #[JsonProperty('email')]
    private string $email;

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
     *   email: string,
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
        $this->email = $values['email'];
        $this->customer = $values['customer'] ?? null;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail(string $value): self
    {
        $this->email = $value;
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
