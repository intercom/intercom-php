<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;

class DetachSubscriptionFromContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
     */
    private string $contactId;

    /**
     * @var string $subscriptionId The unique identifier for the subscription type which is given by Intercom
     */
    private string $subscriptionId;

    /**
     * @param array{
     *   contactId: string,
     *   subscriptionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->subscriptionId = $values['subscriptionId'];
    }

    /**
     * @return string
     */
    public function getContactId(): string
    {
        return $this->contactId;
    }

    /**
     * @param string $value
     */
    public function setContactId(string $value): self
    {
        $this->contactId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $value
     */
    public function setSubscriptionId(string $value): self
    {
        $this->subscriptionId = $value;
        return $this;
    }
}
