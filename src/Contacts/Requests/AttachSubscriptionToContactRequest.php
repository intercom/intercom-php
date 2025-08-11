<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachSubscriptionToContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
     */
    private string $contactId;

    /**
     * @var string $subscriptionId The unique identifier for the subscription which is given by Intercom
     */
    #[JsonProperty('id')]
    private string $subscriptionId;

    /**
     * @var string $consentType The consent_type of a subscription, opt_out or opt_in.
     */
    #[JsonProperty('consent_type')]
    private string $consentType;

    /**
     * @param array{
     *   contactId: string,
     *   subscriptionId: string,
     *   consentType: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->subscriptionId = $values['subscriptionId'];
        $this->consentType = $values['consentType'];
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

    /**
     * @return string
     */
    public function getConsentType(): string
    {
        return $this->consentType;
    }

    /**
     * @param string $value
     */
    public function setConsentType(string $value): self
    {
        $this->consentType = $value;
        return $this;
    }
}
