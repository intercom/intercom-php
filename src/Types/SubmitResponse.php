<?php

namespace Intercom\Types;

use Intercom\Core\Json\JsonSerializableType;
use Intercom\Core\Json\JsonProperty;
use Intercom\Core\Types\ArrayType;

/**
 * The response object returned when submitting an app interaction. This will replace the previous canvas that was visible until the app was interacted with.
 *
 * You can optionally provide an event object with the attribute `type` given as `completed` to tell us if the app has completed its purpose. For example, an email collector app would be complete when the end-user submits their email address.
 *
 * Apps in conversation details can also optionally insert an app into the conversation reply:
 *
 * 1. You respond with a card_creation_options object (https://developers.intercom.com/canvas-kit-reference/reference/card-creation-options)
 * 2. We send a request to the initialize URL for Messenger capabilities (https://developers.intercom.com/docs/build-an-integration/getting-started/build-an-app-for-your-messenger/request-flows) with the card_creation_options object present
 * 3. You respond with a canvas object with the components you want to insert into the conversation reply
 */
class SubmitResponse extends JsonSerializableType
{
    /**
     * @var CanvasObject $canvas The canvas object that defines the new UI to be shown.
     */
    #[JsonProperty('canvas')]
    private CanvasObject $canvas;

    /**
     * @var ?array<string, mixed> $cardCreationOptions Optional. Key-value pairs that will be sent in the initialize request to insert an app into the conversation reply.
     */
    #[JsonProperty('card_creation_options'), ArrayType(['string' => 'mixed'])]
    private ?array $cardCreationOptions;

    /**
     * @var ?Event $event Optional. Indicates if the app has completed its purpose.
     */
    #[JsonProperty('event')]
    private ?Event $event;

    /**
     * @param array{
     *   canvas: CanvasObject,
     *   cardCreationOptions?: ?array<string, mixed>,
     *   event?: ?Event,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canvas = $values['canvas'];
        $this->cardCreationOptions = $values['cardCreationOptions'] ?? null;
        $this->event = $values['event'] ?? null;
    }

    /**
     * @return CanvasObject
     */
    public function getCanvas(): CanvasObject
    {
        return $this->canvas;
    }

    /**
     * @param CanvasObject $value
     */
    public function setCanvas(CanvasObject $value): self
    {
        $this->canvas = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getCardCreationOptions(): ?array
    {
        return $this->cardCreationOptions;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setCardCreationOptions(?array $value = null): self
    {
        $this->cardCreationOptions = $value;
        return $this;
    }

    /**
     * @return ?Event
     */
    public function getEvent(): ?Event
    {
        return $this->event;
    }

    /**
     * @param ?Event $value
     */
    public function setEvent(?Event $value = null): self
    {
        $this->event = $value;
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
