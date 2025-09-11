<?php

namespace Intercom\Contacts\Traits;

use Intercom\Types\ContactTags;
use Intercom\Types\ContactNotes;
use Intercom\Types\ContactCompanies;
use Intercom\Types\ContactLocation;
use Intercom\Types\ContactSocialProfiles;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Contacts represent your leads and users in Intercom.
 *
 * @property ?'contact' $type
 * @property ?string $id
 * @property ?string $externalId
 * @property ?string $workspaceId
 * @property ?string $role
 * @property ?string $email
 * @property ?string $emailDomain
 * @property ?string $phone
 * @property ?string $name
 * @property ?int $ownerId
 * @property ?bool $hasHardBounced
 * @property ?bool $markedEmailAsSpam
 * @property ?bool $unsubscribedFromEmails
 * @property ?int $createdAt
 * @property ?int $updatedAt
 * @property ?int $signedUpAt
 * @property ?int $lastSeenAt
 * @property ?int $lastRepliedAt
 * @property ?int $lastContactedAt
 * @property ?int $lastEmailOpenedAt
 * @property ?int $lastEmailClickedAt
 * @property ?string $languageOverride
 * @property ?string $browser
 * @property ?string $browserVersion
 * @property ?string $browserLanguage
 * @property ?string $os
 * @property ?string $androidAppName
 * @property ?string $androidAppVersion
 * @property ?string $androidDevice
 * @property ?string $androidOsVersion
 * @property ?string $androidSdkVersion
 * @property ?int $androidLastSeenAt
 * @property ?string $iosAppName
 * @property ?string $iosAppVersion
 * @property ?string $iosDevice
 * @property ?string $iosOsVersion
 * @property ?string $iosSdkVersion
 * @property ?int $iosLastSeenAt
 * @property ?array<string, mixed> $customAttributes
 * @property ?string $avatar
 * @property ?ContactTags $tags
 * @property ?ContactNotes $notes
 * @property ?ContactCompanies $companies
 * @property ?ContactLocation $location
 * @property ?ContactSocialProfiles $socialProfiles
 */
trait Contact
{
    /**
     * @var ?'contact' $type The type of object.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier for the contact which is given by Intercom.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $externalId The unique identifier for the contact which is provided by the Client.
     */
    #[JsonProperty('external_id')]
    private ?string $externalId;

    /**
     * @var ?string $workspaceId The id of the workspace which the contact belongs to.
     */
    #[JsonProperty('workspace_id')]
    private ?string $workspaceId;

    /**
     * @var ?string $role The role of the contact.
     */
    #[JsonProperty('role')]
    private ?string $role;

    /**
     * @var ?string $email The contact's email.
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $emailDomain The contact's email domain.
     */
    #[JsonProperty('email_domain')]
    private ?string $emailDomain;

    /**
     * @var ?string $phone The contacts phone.
     */
    #[JsonProperty('phone')]
    private ?string $phone;

    /**
     * @var ?string $name The contacts name.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?int $ownerId The id of an admin that has been assigned account ownership of the contact.
     */
    #[JsonProperty('owner_id')]
    private ?int $ownerId;

    /**
     * @var ?bool $hasHardBounced Whether the contact has had an email sent to them hard bounce.
     */
    #[JsonProperty('has_hard_bounced')]
    private ?bool $hasHardBounced;

    /**
     * @var ?bool $markedEmailAsSpam Whether the contact has marked an email sent to them as spam.
     */
    #[JsonProperty('marked_email_as_spam')]
    private ?bool $markedEmailAsSpam;

    /**
     * @var ?bool $unsubscribedFromEmails Whether the contact is unsubscribed from emails.
     */
    #[JsonProperty('unsubscribed_from_emails')]
    private ?bool $unsubscribedFromEmails;

    /**
     * @var ?int $createdAt (UNIX timestamp) The time when the contact was created.
     */
    #[JsonProperty('created_at')]
    private ?int $createdAt;

    /**
     * @var ?int $updatedAt (UNIX timestamp) The time when the contact was last updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?int $signedUpAt (UNIX timestamp) The time specified for when a contact signed up.
     */
    #[JsonProperty('signed_up_at')]
    private ?int $signedUpAt;

    /**
     * @var ?int $lastSeenAt (UNIX timestamp) The time when the contact was last seen (either where the Intercom Messenger was installed or when specified manually).
     */
    #[JsonProperty('last_seen_at')]
    private ?int $lastSeenAt;

    /**
     * @var ?int $lastRepliedAt (UNIX timestamp) The time when the contact last messaged in.
     */
    #[JsonProperty('last_replied_at')]
    private ?int $lastRepliedAt;

    /**
     * @var ?int $lastContactedAt (UNIX timestamp) The time when the contact was last messaged.
     */
    #[JsonProperty('last_contacted_at')]
    private ?int $lastContactedAt;

    /**
     * @var ?int $lastEmailOpenedAt (UNIX timestamp) The time when the contact last opened an email.
     */
    #[JsonProperty('last_email_opened_at')]
    private ?int $lastEmailOpenedAt;

    /**
     * @var ?int $lastEmailClickedAt (UNIX timestamp) The time when the contact last clicked a link in an email.
     */
    #[JsonProperty('last_email_clicked_at')]
    private ?int $lastEmailClickedAt;

    /**
     * @var ?string $languageOverride A preferred language setting for the contact, used by the Intercom Messenger even if their browser settings change.
     */
    #[JsonProperty('language_override')]
    private ?string $languageOverride;

    /**
     * @var ?string $browser The name of the browser which the contact is using.
     */
    #[JsonProperty('browser')]
    private ?string $browser;

    /**
     * @var ?string $browserVersion The version of the browser which the contact is using.
     */
    #[JsonProperty('browser_version')]
    private ?string $browserVersion;

    /**
     * @var ?string $browserLanguage The language set by the browser which the contact is using.
     */
    #[JsonProperty('browser_language')]
    private ?string $browserLanguage;

    /**
     * @var ?string $os The operating system which the contact is using.
     */
    #[JsonProperty('os')]
    private ?string $os;

    /**
     * @var ?string $androidAppName The name of the Android app which the contact is using.
     */
    #[JsonProperty('android_app_name')]
    private ?string $androidAppName;

    /**
     * @var ?string $androidAppVersion The version of the Android app which the contact is using.
     */
    #[JsonProperty('android_app_version')]
    private ?string $androidAppVersion;

    /**
     * @var ?string $androidDevice The Android device which the contact is using.
     */
    #[JsonProperty('android_device')]
    private ?string $androidDevice;

    /**
     * @var ?string $androidOsVersion The version of the Android OS which the contact is using.
     */
    #[JsonProperty('android_os_version')]
    private ?string $androidOsVersion;

    /**
     * @var ?string $androidSdkVersion The version of the Android SDK which the contact is using.
     */
    #[JsonProperty('android_sdk_version')]
    private ?string $androidSdkVersion;

    /**
     * @var ?int $androidLastSeenAt (UNIX timestamp) The time when the contact was last seen on an Android device.
     */
    #[JsonProperty('android_last_seen_at')]
    private ?int $androidLastSeenAt;

    /**
     * @var ?string $iosAppName The name of the iOS app which the contact is using.
     */
    #[JsonProperty('ios_app_name')]
    private ?string $iosAppName;

    /**
     * @var ?string $iosAppVersion The version of the iOS app which the contact is using.
     */
    #[JsonProperty('ios_app_version')]
    private ?string $iosAppVersion;

    /**
     * @var ?string $iosDevice The iOS device which the contact is using.
     */
    #[JsonProperty('ios_device')]
    private ?string $iosDevice;

    /**
     * @var ?string $iosOsVersion The version of iOS which the contact is using.
     */
    #[JsonProperty('ios_os_version')]
    private ?string $iosOsVersion;

    /**
     * @var ?string $iosSdkVersion The version of the iOS SDK which the contact is using.
     */
    #[JsonProperty('ios_sdk_version')]
    private ?string $iosSdkVersion;

    /**
     * @var ?int $iosLastSeenAt (UNIX timestamp) The last time the contact used the iOS app.
     */
    #[JsonProperty('ios_last_seen_at')]
    private ?int $iosLastSeenAt;

    /**
     * @var ?array<string, mixed> $customAttributes The custom attributes which are set for the contact.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @var ?string $avatar An image URL containing the avatar of a contact.
     */
    #[JsonProperty('avatar')]
    private ?string $avatar;

    /**
     * @var ?ContactTags $tags
     */
    #[JsonProperty('tags')]
    private ?ContactTags $tags;

    /**
     * @var ?ContactNotes $notes
     */
    #[JsonProperty('notes')]
    private ?ContactNotes $notes;

    /**
     * @var ?ContactCompanies $companies
     */
    #[JsonProperty('companies')]
    private ?ContactCompanies $companies;

    /**
     * @var ?ContactLocation $location
     */
    #[JsonProperty('location')]
    private ?ContactLocation $location;

    /**
     * @var ?ContactSocialProfiles $socialProfiles
     */
    #[JsonProperty('social_profiles')]
    private ?ContactSocialProfiles $socialProfiles;

    /**
     * @return ?'contact'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'contact' $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
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
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * @param ?string $value
     */
    public function setWorkspaceId(?string $value = null): self
    {
        $this->workspaceId = $value;
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
    public function getEmailDomain(): ?string
    {
        return $this->emailDomain;
    }

    /**
     * @param ?string $value
     */
    public function setEmailDomain(?string $value = null): self
    {
        $this->emailDomain = $value;
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
    public function getHasHardBounced(): ?bool
    {
        return $this->hasHardBounced;
    }

    /**
     * @param ?bool $value
     */
    public function setHasHardBounced(?bool $value = null): self
    {
        $this->hasHardBounced = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getMarkedEmailAsSpam(): ?bool
    {
        return $this->markedEmailAsSpam;
    }

    /**
     * @param ?bool $value
     */
    public function setMarkedEmailAsSpam(?bool $value = null): self
    {
        $this->markedEmailAsSpam = $value;
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
     * @return ?int
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param ?int $value
     */
    public function setCreatedAt(?int $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setUpdatedAt(?int $value = null): self
    {
        $this->updatedAt = $value;
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
    public function getLastRepliedAt(): ?int
    {
        return $this->lastRepliedAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastRepliedAt(?int $value = null): self
    {
        $this->lastRepliedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastContactedAt(): ?int
    {
        return $this->lastContactedAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastContactedAt(?int $value = null): self
    {
        $this->lastContactedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastEmailOpenedAt(): ?int
    {
        return $this->lastEmailOpenedAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastEmailOpenedAt(?int $value = null): self
    {
        $this->lastEmailOpenedAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLastEmailClickedAt(): ?int
    {
        return $this->lastEmailClickedAt;
    }

    /**
     * @param ?int $value
     */
    public function setLastEmailClickedAt(?int $value = null): self
    {
        $this->lastEmailClickedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLanguageOverride(): ?string
    {
        return $this->languageOverride;
    }

    /**
     * @param ?string $value
     */
    public function setLanguageOverride(?string $value = null): self
    {
        $this->languageOverride = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    /**
     * @param ?string $value
     */
    public function setBrowser(?string $value = null): self
    {
        $this->browser = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBrowserVersion(): ?string
    {
        return $this->browserVersion;
    }

    /**
     * @param ?string $value
     */
    public function setBrowserVersion(?string $value = null): self
    {
        $this->browserVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBrowserLanguage(): ?string
    {
        return $this->browserLanguage;
    }

    /**
     * @param ?string $value
     */
    public function setBrowserLanguage(?string $value = null): self
    {
        $this->browserLanguage = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * @param ?string $value
     */
    public function setOs(?string $value = null): self
    {
        $this->os = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAndroidAppName(): ?string
    {
        return $this->androidAppName;
    }

    /**
     * @param ?string $value
     */
    public function setAndroidAppName(?string $value = null): self
    {
        $this->androidAppName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAndroidAppVersion(): ?string
    {
        return $this->androidAppVersion;
    }

    /**
     * @param ?string $value
     */
    public function setAndroidAppVersion(?string $value = null): self
    {
        $this->androidAppVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAndroidDevice(): ?string
    {
        return $this->androidDevice;
    }

    /**
     * @param ?string $value
     */
    public function setAndroidDevice(?string $value = null): self
    {
        $this->androidDevice = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAndroidOsVersion(): ?string
    {
        return $this->androidOsVersion;
    }

    /**
     * @param ?string $value
     */
    public function setAndroidOsVersion(?string $value = null): self
    {
        $this->androidOsVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAndroidSdkVersion(): ?string
    {
        return $this->androidSdkVersion;
    }

    /**
     * @param ?string $value
     */
    public function setAndroidSdkVersion(?string $value = null): self
    {
        $this->androidSdkVersion = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAndroidLastSeenAt(): ?int
    {
        return $this->androidLastSeenAt;
    }

    /**
     * @param ?int $value
     */
    public function setAndroidLastSeenAt(?int $value = null): self
    {
        $this->androidLastSeenAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIosAppName(): ?string
    {
        return $this->iosAppName;
    }

    /**
     * @param ?string $value
     */
    public function setIosAppName(?string $value = null): self
    {
        $this->iosAppName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIosAppVersion(): ?string
    {
        return $this->iosAppVersion;
    }

    /**
     * @param ?string $value
     */
    public function setIosAppVersion(?string $value = null): self
    {
        $this->iosAppVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIosDevice(): ?string
    {
        return $this->iosDevice;
    }

    /**
     * @param ?string $value
     */
    public function setIosDevice(?string $value = null): self
    {
        $this->iosDevice = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIosOsVersion(): ?string
    {
        return $this->iosOsVersion;
    }

    /**
     * @param ?string $value
     */
    public function setIosOsVersion(?string $value = null): self
    {
        $this->iosOsVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIosSdkVersion(): ?string
    {
        return $this->iosSdkVersion;
    }

    /**
     * @param ?string $value
     */
    public function setIosSdkVersion(?string $value = null): self
    {
        $this->iosSdkVersion = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getIosLastSeenAt(): ?int
    {
        return $this->iosLastSeenAt;
    }

    /**
     * @param ?int $value
     */
    public function setIosLastSeenAt(?int $value = null): self
    {
        $this->iosLastSeenAt = $value;
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
     * @return ?ContactTags
     */
    public function getTags(): ?ContactTags
    {
        return $this->tags;
    }

    /**
     * @param ?ContactTags $value
     */
    public function setTags(?ContactTags $value = null): self
    {
        $this->tags = $value;
        return $this;
    }

    /**
     * @return ?ContactNotes
     */
    public function getNotes(): ?ContactNotes
    {
        return $this->notes;
    }

    /**
     * @param ?ContactNotes $value
     */
    public function setNotes(?ContactNotes $value = null): self
    {
        $this->notes = $value;
        return $this;
    }

    /**
     * @return ?ContactCompanies
     */
    public function getCompanies(): ?ContactCompanies
    {
        return $this->companies;
    }

    /**
     * @param ?ContactCompanies $value
     */
    public function setCompanies(?ContactCompanies $value = null): self
    {
        $this->companies = $value;
        return $this;
    }

    /**
     * @return ?ContactLocation
     */
    public function getLocation(): ?ContactLocation
    {
        return $this->location;
    }

    /**
     * @param ?ContactLocation $value
     */
    public function setLocation(?ContactLocation $value = null): self
    {
        $this->location = $value;
        return $this;
    }

    /**
     * @return ?ContactSocialProfiles
     */
    public function getSocialProfiles(): ?ContactSocialProfiles
    {
        return $this->socialProfiles;
    }

    /**
     * @param ?ContactSocialProfiles $value
     */
    public function setSocialProfiles(?ContactSocialProfiles $value = null): self
    {
        $this->socialProfiles = $value;
        return $this;
    }
}
