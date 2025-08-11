<?php

namespace Intercom\Contacts\Requests;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

class UpdateContactRequest extends JsonSerializableType
{
    /**
     * @var string $contactId id
     */
    private string $contactId;

    /**
     * @var ?string $role The role of the contact.
     */
    #[JsonProperty('role')]
    private ?string $role;

    /**
     * @var ?string $externalId A unique identifier for the contact which is given to Intercom
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var ?string $email The contacts email
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $phone The contacts phone
     */
    #[JsonProperty('phone')]
    private ?string $phone;

    /**
     * @var ?string $name The contacts name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $avatar An image URL containing the avatar of a contact
     */
    #[JsonProperty('avatar')]
    private ?string $avatar;

    /**
     * @var ?int $signedUpAt The time specified for when a contact signed up
     */
    #[JsonProperty('signed_up_at')]
    private ?int $signedUpAt;

    /**
     * @var ?int $lastSeenAt The time when the contact was last seen (either where the Intercom Messenger was installed or when specified manually)
     */
    #[JsonProperty('last_seen_at')]
    private ?int $lastSeenAt;

    /**
     * @var ?int $ownerId The id of an admin that has been assigned account ownership of the contact
     */
    #[JsonProperty('owner_id')]
    private ?int $ownerId;

    /**
     * @var ?bool $unsubscribedFromEmails Whether the contact is unsubscribed from emails
     */
    #[JsonProperty('unsubscribed_from_emails')]
    private ?bool $unsubscribedFromEmails;

    /**
     * @var ?array<string, mixed> $customAttributes The custom attributes which are set for the contact
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @param array{
     *   contactId: string,
     *   role?: ?string,
     *   externalId?: ?string,
     *   email?: ?string,
     *   phone?: ?string,
     *   name?: ?string,
     *   avatar?: ?string,
     *   signedUpAt?: ?int,
     *   lastSeenAt?: ?int,
     *   ownerId?: ?int,
     *   unsubscribedFromEmails?: ?bool,
     *   customAttributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contactId = $values['contactId'];
        $this->role = $values['role'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->avatar = $values['avatar'] ?? null;
        $this->signedUpAt = $values['signedUpAt'] ?? null;
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->ownerId = $values['ownerId'] ?? null;
        $this->unsubscribedFromEmails = $values['unsubscribedFromEmails'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
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
     * @return ?string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param ?string $value
     */
    public function setRole(?string $value = null): self
    {
        $this->role = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalId(?string $value = null): self
    {
        $this->externalId = $value;
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
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param ?string $value
     */
    public function setPhone(?string $value = null): self
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param ?string $value
     */
    public function setAvatar(?string $value = null): self
    {
        $this->avatar = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSignedUpAt(): ?int
    {
        return $this->signedUpAt;
    }

    /**
     * @param ?int $value
     */
    public function setSignedUpAt(?int $value = null): self
    {
        $this->signedUpAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastSeenAt(): ?int
    {
        return $this->lastSeenAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastSeenAt(?int $value = null): self
    {
        $this->lastSeenAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param ?int $value
     */
    public function setOwnerId(?int $value = null): self
    {
        $this->ownerId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getUnsubscribedFromEmails(): ?bool
    {
        return $this->unsubscribedFromEmails;
    }

    /**
     * @param ?bool $value
     */
    public function setUnsubscribedFromEmails(?bool $value = null): self
    {
        $this->unsubscribedFromEmails = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }
}
