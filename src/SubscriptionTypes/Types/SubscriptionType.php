<?php

namespace Intercom\SubscriptionTypes\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Types\Translation;
use Intercom\Core\Types\ArrayType;

/**
 * A subscription type lets customers easily opt out of non-essential communications without missing what's important to them.
 */
class SubscriptionType extends JsonSerializableType
{
    /**
     * @var ?'subscription' $type The type of the object - subscription
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The unique identifier representing the subscription type.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?value-of<SubscriptionTypeState> $state The state of the subscription type.
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?Translation $defaultTranslation
     */
    #[JsonProperty('default_translation')]
    private ?Translation $defaultTranslation;

    /**
     * @var ?array<Translation> $translations An array of translations objects with the localised version of the subscription type in each available locale within your translation settings.
     */
    #[JsonProperty('translations'), ArrayType([Translation::class])]
    private ?array $translations;

    /**
     * @var ?value-of<SubscriptionTypeConsentType> $consentType Describes the type of consent.
     */
    #[JsonProperty('consent_type')]
    private ?string $consentType;

    /**
     * @var ?array<value-of<SubscriptionTypeContentTypesItem>> $contentTypes The message types that this subscription supports - can contain `email` or `sms_message`.
     */
    #[JsonProperty('content_types'), ArrayType(['string'])]
    private ?array $contentTypes;

    /**
     * @param array{
     *   type?: ?'subscription',
     *   id?: ?string,
     *   state?: ?value-of<SubscriptionTypeState>,
     *   defaultTranslation?: ?Translation,
     *   translations?: ?array<Translation>,
     *   consentType?: ?value-of<SubscriptionTypeConsentType>,
     *   contentTypes?: ?array<value-of<SubscriptionTypeContentTypesItem>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->defaultTranslation = $values['defaultTranslation'] ?? null;
        $this->translations = $values['translations'] ?? null;
        $this->consentType = $values['consentType'] ?? null;
        $this->contentTypes = $values['contentTypes'] ?? null;
    }

    /**
     * @return ?'subscription'
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?'subscription' $value
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
     * @return ?value-of<SubscriptionTypeState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<SubscriptionTypeState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?Translation
     */
    public function getDefaultTranslation(): ?Translation
    {
        return $this->defaultTranslation;
    }

    /**
     * @param ?Translation $value
     */
    public function setDefaultTranslation(?Translation $value = null): self
    {
        $this->defaultTranslation = $value;
        return $this;
    }

    /**
     * @return ?array<Translation>
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param ?array<Translation> $value
     */
    public function setTranslations(?array $value = null): self
    {
        $this->translations = $value;
        return $this;
    }

    /**
     * @return ?value-of<SubscriptionTypeConsentType>
     */
    public function getConsentType(): ?string
    {
        return $this->consentType;
    }

    /**
     * @param ?value-of<SubscriptionTypeConsentType> $value
     */
    public function setConsentType(?string $value = null): self
    {
        $this->consentType = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<SubscriptionTypeContentTypesItem>>
     */
    public function getContentTypes(): ?array
    {
        return $this->contentTypes;
    }

    /**
     * @param ?array<value-of<SubscriptionTypeContentTypesItem>> $value
     */
    public function setContentTypes(?array $value = null): self
    {
        $this->contentTypes = $value;
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
