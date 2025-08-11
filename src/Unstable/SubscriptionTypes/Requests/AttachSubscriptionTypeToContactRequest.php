<?php

namespace Intercom\Unstable\SubscriptionTypes\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

class AttachSubscriptionTypeToContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId The unique identifier for the contact which is given by Intercom
     */
    private string $contactId;

    /**
     * @var string $id The unique identifier for the subscription which is given by Intercom
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $consentType The consent_type of a subscription, opt_out or opt_in.
     */
    #[JsonProperty('consent_type')]
    private string $consentType;

    /**
     * @param array{
     *   contactId: string,
     *   id: string,
     *   consentType: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->id = $values['id'];
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
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
