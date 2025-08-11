<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;

/**
 * The context object provides additional details on where the app has been added (or is currently being used), what page the app is being used on, and information on the Messenger settings. This is in order for you give a fully customised experience based on the customers use case.
 *
 * If the `location` is `conversation` then you will also be given a `conversation_id`. If you need to use details about the conversation, then you have to use the `conversation_id` to [make a call to our Conversations API and retrieve the conversation object](https://developers.intercom.com/intercom-api-reference/reference#get-a-single-conversation).
 */
class Context extends JsonSerializableType
{
    /**
     * @var ?int $conversationId The id of the conversation where the app is added or being used.
     */
    #[JsonProperty('conversation_id')]
    private ?int $conversationId;

    /**
     * @var ?value-of<ContextLocation> $location Where the app is added or the action took place. Can be either 'conversation', 'home', 'message', or 'operator'.
     */
    #[JsonProperty('location')]
    private ?string $location;

    /**
     * @var ?string $locale The default end-user language of the Messenger. Use to localise Messenger App content.
     */
    #[JsonProperty('locale')]
    private ?string $locale;

    /**
     * @var ?string $messengerActionColour The messengers action colour. Use in Sheets and Icons to make a Messenger App experience feel part of the host Messenger.
     */
    #[JsonProperty('messenger_action_colour')]
    private ?string $messengerActionColour;

    /**
     * @var ?string $messengerBackgroundColour The messengers background colour. Use in Sheets and Icons to make a Messenger App experience feel part of the host Messenger.
     */
    #[JsonProperty('messenger_background_colour')]
    private ?string $messengerBackgroundColour;

    /**
     * @var ?string $referrer The current page URL where the app is being used.
     */
    #[JsonProperty('referrer')]
    private ?string $referrer;

    /**
     * @param array{
     *   conversationId?: ?int,
     *   location?: ?value-of<ContextLocation>,
     *   locale?: ?string,
     *   messengerActionColour?: ?string,
     *   messengerBackgroundColour?: ?string,
     *   referrer?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationId = $values['conversationId'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->messengerActionColour = $values['messengerActionColour'] ?? null;
        $this->messengerBackgroundColour = $values['messengerBackgroundColour'] ?? null;
        $this->referrer = $values['referrer'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getConversationId(): ?int
    {
        return $this->conversationId;
    }

    /**
     * @param ?int $value
     */
    public function setConversationId(?int $value = null): self
    {
        $this->conversationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<ContextLocation>
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param ?value-of<ContextLocation> $value
     */
    public function setLocation(?string $value = null): self
    {
        $this->location = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param ?string $value
     */
    public function setLocale(?string $value = null): self
    {
        $this->locale = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMessengerActionColour(): ?string
    {
        return $this->messengerActionColour;
    }

    /**
     * @param ?string $value
     */
    public function setMessengerActionColour(?string $value = null): self
    {
        $this->messengerActionColour = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMessengerBackgroundColour(): ?string
    {
        return $this->messengerBackgroundColour;
    }

    /**
     * @param ?string $value
     */
    public function setMessengerBackgroundColour(?string $value = null): self
    {
        $this->messengerBackgroundColour = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
