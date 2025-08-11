<?php

namespace Intercom\Unstable\Contacts\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Unstable\Contacts\Traits\Contact;
use Intercom\Core\Json\JsonProperty;
use Intercom\Unstable\Types\ContactTags;
use Intercom\Unstable\Types\ContactNotes;
use Intercom\Unstable\Types\ContactCompanies;
use Intercom\Unstable\Types\ContactLocation;
use Intercom\Unstable\Types\ContactSocialProfiles;

class MergeContactResponse extends JsonSerializableType
{
    use Contact;

    /**
     * @var ?bool $enabledPushMessaging If the user has enabled push messaging.
     */
    #[JsonProperty('enabled_push_messaging')]
    private ?bool $enabledPushMessaging;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   externalId?: ?string,
     *   workspaceId?: ?string,
     *   role?: ?string,
     *   email?: ?string,
     *   emailDomain?: ?string,
     *   phone?: ?string,
     *   formattedPhone?: ?string,
     *   name?: ?string,
     *   ownerId?: ?int,
     *   hasHardBounced?: ?bool,
     *   markedEmailAsSpam?: ?bool,
     *   unsubscribedFromEmails?: ?bool,
     *   createdAt?: ?int,
     *   updatedAt?: ?int,
     *   signedUpAt?: ?int,
     *   lastSeenAt?: ?int,
     *   lastRepliedAt?: ?int,
     *   lastContactedAt?: ?int,
     *   lastEmailOpenedAt?: ?int,
     *   lastEmailClickedAt?: ?int,
     *   languageOverride?: ?string,
     *   browser?: ?string,
     *   browserVersion?: ?string,
     *   browserLanguage?: ?string,
     *   os?: ?string,
     *   androidAppName?: ?string,
     *   androidAppVersion?: ?string,
     *   androidDevice?: ?string,
     *   androidOsVersion?: ?string,
     *   androidSdkVersion?: ?string,
     *   androidLastSeenAt?: ?int,
     *   iosAppName?: ?string,
     *   iosAppVersion?: ?string,
     *   iosDevice?: ?string,
     *   iosOsVersion?: ?string,
     *   iosSdkVersion?: ?string,
     *   iosLastSeenAt?: ?int,
     *   customAttributes?: ?array<string, mixed>,
     *   avatar?: ?ContactAvatar,
     *   tags?: ?ContactTags,
     *   notes?: ?ContactNotes,
     *   companies?: ?ContactCompanies,
     *   location?: ?ContactLocation,
     *   socialProfiles?: ?ContactSocialProfiles,
     *   enabledPushMessaging?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->workspaceId = $values['workspaceId'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailDomain = $values['emailDomain'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->formattedPhone = $values['formattedPhone'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->ownerId = $values['ownerId'] ?? null;
        $this->hasHardBounced = $values['hasHardBounced'] ?? null;
        $this->markedEmailAsSpam = $values['markedEmailAsSpam'] ?? null;
        $this->unsubscribedFromEmails = $values['unsubscribedFromEmails'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->signedUpAt = $values['signedUpAt'] ?? null;
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->lastRepliedAt = $values['lastRepliedAt'] ?? null;
        $this->lastContactedAt = $values['lastContactedAt'] ?? null;
        $this->lastEmailOpenedAt = $values['lastEmailOpenedAt'] ?? null;
        $this->lastEmailClickedAt = $values['lastEmailClickedAt'] ?? null;
        $this->languageOverride = $values['languageOverride'] ?? null;
        $this->browser = $values['browser'] ?? null;
        $this->browserVersion = $values['browserVersion'] ?? null;
        $this->browserLanguage = $values['browserLanguage'] ?? null;
        $this->os = $values['os'] ?? null;
        $this->androidAppName = $values['androidAppName'] ?? null;
        $this->androidAppVersion = $values['androidAppVersion'] ?? null;
        $this->androidDevice = $values['androidDevice'] ?? null;
        $this->androidOsVersion = $values['androidOsVersion'] ?? null;
        $this->androidSdkVersion = $values['androidSdkVersion'] ?? null;
        $this->androidLastSeenAt = $values['androidLastSeenAt'] ?? null;
        $this->iosAppName = $values['iosAppName'] ?? null;
        $this->iosAppVersion = $values['iosAppVersion'] ?? null;
        $this->iosDevice = $values['iosDevice'] ?? null;
        $this->iosOsVersion = $values['iosOsVersion'] ?? null;
        $this->iosSdkVersion = $values['iosSdkVersion'] ?? null;
        $this->iosLastSeenAt = $values['iosLastSeenAt'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->avatar = $values['avatar'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->companies = $values['companies'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->socialProfiles = $values['socialProfiles'] ?? null;
        $this->enabledPushMessaging = $values['enabledPushMessaging'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getEnabledPushMessaging(): ?bool
    {
        return $this->enabledPushMessaging;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabledPushMessaging(?bool $value = null): self
    {
        $this->enabledPushMessaging = $value;
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
