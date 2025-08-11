<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * Visitors are useful for representing anonymous people that have not yet been identified. They usually represent website visitors. Visitors are not visible in Intercom platform. The Visitors resource provides methods to fetch, update, convert and delete.
 */
class Visitor extends JsonSerializableType
{
    /**
     * @var 'visitor' $type Value is 'visitor'
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $id The Intercom defined id representing the Visitor.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $userId Automatically generated identifier for the Visitor.
     */
    #[JsonProperty('user_id')]
    private string $userId;

    /**
     * @var bool $anonymous Identifies if this visitor is anonymous.
     */
    #[JsonProperty('anonymous')]
    private bool $anonymous;

    /**
     * @var string $email The email of the visitor.
     */
    #[JsonProperty('email')]
    private string $email;

    /**
     * @var ?string $phone The phone number of the visitor.
     */
    #[JsonProperty('phone')]
    private ?string $phone;

    /**
     * @var ?string $name The name of the visitor.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $pseudonym The pseudonym of the visitor.
     */
    #[JsonProperty('pseudonym')]
    private ?string $pseudonym;

    /**
     * @var ?VisitorAvatar $avatar
     */
    #[JsonProperty('avatar')]
    private ?VisitorAvatar $avatar;

    /**
     * @var string $appId The id of the app the visitor is associated with.
     */
    #[JsonProperty('app_id')]
    private string $appId;

    /**
     * @var ?VisitorCompanies $companies
     */
    #[JsonProperty('companies')]
    private ?VisitorCompanies $companies;

    /**
     * @var ?VisitorLocationData $locationData
     */
    #[JsonProperty('location_data')]
    private ?VisitorLocationData $locationData;

    /**
     * @var ?int $lasRequestAt The time the Lead last recorded making a request.
     */
    #[JsonProperty('las_request_at')]
    private ?int $lasRequestAt;

    /**
     * @var int $createdAt The time the Visitor was added to Intercom.
     */
    #[JsonProperty('created_at')]
    private int $createdAt;

    /**
     * @var ?int $remoteCreatedAt The time the Visitor was added to Intercom.
     */
    #[JsonProperty('remote_created_at')]
    private ?int $remoteCreatedAt;

    /**
     * @var int $signedUpAt The time the Visitor signed up for your product.
     */
    #[JsonProperty('signed_up_at')]
    private int $signedUpAt;

    /**
     * @var ?int $updatedAt The last time the Visitor was updated.
     */
    #[JsonProperty('updated_at')]
    private ?int $updatedAt;

    /**
     * @var ?int $sessionCount The number of sessions the Visitor has had.
     */
    #[JsonProperty('session_count')]
    private ?int $sessionCount;

    /**
     * @var ?VisitorSocialProfiles $socialProfiles
     */
    #[JsonProperty('social_profiles')]
    private ?VisitorSocialProfiles $socialProfiles;

    /**
     * @var ?string $ownerId The id of the admin that owns the Visitor.
     */
    #[JsonProperty('owner_id')]
    private ?string $ownerId;

    /**
     * @var ?bool $unsubscribedFromEmails Whether the Visitor is unsubscribed from emails.
     */
    #[JsonProperty('unsubscribed_from_emails')]
    private ?bool $unsubscribedFromEmails;

    /**
     * @var ?bool $markedEmailAsSpam Identifies if this visitor has marked an email as spam.
     */
    #[JsonProperty('marked_email_as_spam')]
    private ?bool $markedEmailAsSpam;

    /**
     * @var ?bool $hasHardBounced Identifies if this visitor has had a hard bounce.
     */
    #[JsonProperty('has_hard_bounced')]
    private ?bool $hasHardBounced;

    /**
     * @var ?VisitorTags $tags
     */
    #[JsonProperty('tags')]
    private ?VisitorTags $tags;

    /**
     * @var ?VisitorSegments $segments
     */
    #[JsonProperty('segments')]
    private ?VisitorSegments $segments;

    /**
     * @var ?array<string, mixed> $customAttributes The custom attributes you have set on the Visitor.
     */
    #[JsonProperty('custom_attributes'), ArrayType(['string' => 'mixed'])]
    private ?array $customAttributes;

    /**
     * @var ?string $referrer The referer of the visitor.
     */
    #[JsonProperty('referrer')]
    private ?string $referrer;

    /**
     * @var ?string $utmCampaign The utm_campaign of the visitor.
     */
    #[JsonProperty('utm_campaign')]
    private ?string $utmCampaign;

    /**
     * @var ?string $utmContent The utm_content of the visitor.
     */
    #[JsonProperty('utm_content')]
    private ?string $utmContent;

    /**
     * @var ?string $utmMedium The utm_medium of the visitor.
     */
    #[JsonProperty('utm_medium')]
    private ?string $utmMedium;

    /**
     * @var ?string $utmSource The utm_source of the visitor.
     */
    #[JsonProperty('utm_source')]
    private ?string $utmSource;

    /**
     * @var ?string $utmTerm The utm_term of the visitor.
     */
    #[JsonProperty('utm_term')]
    private ?string $utmTerm;

    /**
     * @var ?bool $doNotTrack Identifies if this visitor has do not track enabled.
     */
    #[JsonProperty('do_not_track')]
    private ?bool $doNotTrack;

    /**
     * @param array{
     *   type: 'visitor',
     *   id: string,
     *   userId: string,
     *   anonymous: bool,
     *   email: string,
     *   appId: string,
     *   createdAt: int,
     *   signedUpAt: int,
     *   phone?: ?string,
     *   name?: ?string,
     *   pseudonym?: ?string,
     *   avatar?: ?VisitorAvatar,
     *   companies?: ?VisitorCompanies,
     *   locationData?: ?VisitorLocationData,
     *   lasRequestAt?: ?int,
     *   remoteCreatedAt?: ?int,
     *   updatedAt?: ?int,
     *   sessionCount?: ?int,
     *   socialProfiles?: ?VisitorSocialProfiles,
     *   ownerId?: ?string,
     *   unsubscribedFromEmails?: ?bool,
     *   markedEmailAsSpam?: ?bool,
     *   hasHardBounced?: ?bool,
     *   tags?: ?VisitorTags,
     *   segments?: ?VisitorSegments,
     *   customAttributes?: ?array<string, mixed>,
     *   referrer?: ?string,
     *   utmCampaign?: ?string,
     *   utmContent?: ?string,
     *   utmMedium?: ?string,
     *   utmSource?: ?string,
     *   utmTerm?: ?string,
     *   doNotTrack?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->userId = $values['userId'];
        $this->anonymous = $values['anonymous'];
        $this->email = $values['email'];
        $this->phone = $values['phone'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pseudonym = $values['pseudonym'] ?? null;
        $this->avatar = $values['avatar'] ?? null;
        $this->appId = $values['appId'];
        $this->companies = $values['companies'] ?? null;
        $this->locationData = $values['locationData'] ?? null;
        $this->lasRequestAt = $values['lasRequestAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->remoteCreatedAt = $values['remoteCreatedAt'] ?? null;
        $this->signedUpAt = $values['signedUpAt'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->sessionCount = $values['sessionCount'] ?? null;
        $this->socialProfiles = $values['socialProfiles'] ?? null;
        $this->ownerId = $values['ownerId'] ?? null;
        $this->unsubscribedFromEmails = $values['unsubscribedFromEmails'] ?? null;
        $this->markedEmailAsSpam = $values['markedEmailAsSpam'] ?? null;
        $this->hasHardBounced = $values['hasHardBounced'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->referrer = $values['referrer'] ?? null;
        $this->utmCampaign = $values['utmCampaign'] ?? null;
        $this->utmContent = $values['utmContent'] ?? null;
        $this->utmMedium = $values['utmMedium'] ?? null;
        $this->utmSource = $values['utmSource'] ?? null;
        $this->utmTerm = $values['utmTerm'] ?? null;
        $this->doNotTrack = $values['doNotTrack'] ?? null;
    }

    /**
     * @return 'visitor'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'visitor' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
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
     * @return bool
     */
    public function getAnonymous(): bool
    {
        return $this->anonymous;
    }

    /**
     * @param bool $value
     */
    public function setAnonymous(bool $value): self
    {
        $this->anonymous = $value;
        return $this;
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
    public function getPseudonym(): ?string
    {
        return $this->pseudonym;
    }

    /**
     * @param ?string $value
     */
    public function setPseudonym(?string $value = null): self
    {
        $this->pseudonym = $value;
        return $this;
    }

    /**
     * @return ?VisitorAvatar
     */
    public function getAvatar(): ?VisitorAvatar
    {
        return $this->avatar;
    }

    /**
     * @param ?VisitorAvatar $value
     */
    public function setAvatar(?VisitorAvatar $value = null): self
    {
        $this->avatar = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $value
     */
    public function setAppId(string $value): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return ?VisitorCompanies
     */
    public function getCompanies(): ?VisitorCompanies
    {
        return $this->companies;
    }

    /**
     * @param ?VisitorCompanies $value
     */
    public function setCompanies(?VisitorCompanies $value = null): self
    {
        $this->companies = $value;
        return $this;
    }

    /**
     * @return ?VisitorLocationData
     */
    public function getLocationData(): ?VisitorLocationData
    {
        return $this->locationData;
    }

    /**
     * @param ?VisitorLocationData $value
     */
    public function setLocationData(?VisitorLocationData $value = null): self
    {
        $this->locationData = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLasRequestAt(): ?int
    {
        return $this->lasRequestAt;
    }

    /**
     * @param ?int $value
     */
    public function setLasRequestAt(?int $value = null): self
    {
        $this->lasRequestAt = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $value
     */
    public function setCreatedAt(int $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getRemoteCreatedAt(): ?int
    {
        return $this->remoteCreatedAt;
    }

    /**
     * @param ?int $value
     */
    public function setRemoteCreatedAt(?int $value = null): self
    {
        $this->remoteCreatedAt = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getSignedUpAt(): int
    {
        return $this->signedUpAt;
    }

    /**
     * @param int $value
     */
    public function setSignedUpAt(int $value): self
    {
        $this->signedUpAt = $value;
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
    public function getSessionCount(): ?int
    {
        return $this->sessionCount;
    }

    /**
     * @param ?int $value
     */
    public function setSessionCount(?int $value = null): self
    {
        $this->sessionCount = $value;
        return $this;
    }

    /**
     * @return ?VisitorSocialProfiles
     */
    public function getSocialProfiles(): ?VisitorSocialProfiles
    {
        return $this->socialProfiles;
    }

    /**
     * @param ?VisitorSocialProfiles $value
     */
    public function setSocialProfiles(?VisitorSocialProfiles $value = null): self
    {
        $this->socialProfiles = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    /**
     * @param ?string $value
     */
    public function setOwnerId(?string $value = null): self
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
     * @return ?VisitorTags
     */
    public function getTags(): ?VisitorTags
    {
        return $this->tags;
    }

    /**
     * @param ?VisitorTags $value
     */
    public function setTags(?VisitorTags $value = null): self
    {
        $this->tags = $value;
        return $this;
    }

    /**
     * @return ?VisitorSegments
     */
    public function getSegments(): ?VisitorSegments
    {
        return $this->segments;
    }

    /**
     * @param ?VisitorSegments $value
     */
    public function setSegments(?VisitorSegments $value = null): self
    {
        $this->segments = $value;
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
    public function getReferrer(): ?string
    {
        return $this->referrer;
    }

    /**
     * @param ?string $value
     */
    public function setReferrer(?string $value = null): self
    {
        $this->referrer = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUtmCampaign(): ?string
    {
        return $this->utmCampaign;
    }

    /**
     * @param ?string $value
     */
    public function setUtmCampaign(?string $value = null): self
    {
        $this->utmCampaign = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUtmContent(): ?string
    {
        return $this->utmContent;
    }

    /**
     * @param ?string $value
     */
    public function setUtmContent(?string $value = null): self
    {
        $this->utmContent = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUtmMedium(): ?string
    {
        return $this->utmMedium;
    }

    /**
     * @param ?string $value
     */
    public function setUtmMedium(?string $value = null): self
    {
        $this->utmMedium = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUtmSource(): ?string
    {
        return $this->utmSource;
    }

    /**
     * @param ?string $value
     */
    public function setUtmSource(?string $value = null): self
    {
        $this->utmSource = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUtmTerm(): ?string
    {
        return $this->utmTerm;
    }

    /**
     * @param ?string $value
     */
    public function setUtmTerm(?string $value = null): self
    {
        $this->utmTerm = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getDoNotTrack(): ?bool
    {
        return $this->doNotTrack;
    }

    /**
     * @param ?bool $value
     */
    public function setDoNotTrack(?bool $value = null): self
    {
        $this->doNotTrack = $value;
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
