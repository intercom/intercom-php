<?php

namespace Intercom\CustomChannelEvents;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Types\CustomChannelBaseEvent;
use Intercom\Types\CustomChannelNotificationResponse;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\CustomChannelEvents\Requests\NotifyNewMessageRequest;
use Intercom\CustomChannelEvents\Requests\NotifyQuickReplySelectedRequest;
use Intercom\CustomChannelEvents\Requests\NotifyAttributeCollectedRequest;

class CustomChannelEventsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Notifies Intercom that a new conversation was created in your custom channel/platform. This triggers conversation creation and workflow automations within Intercom for your custom channel integration.
     * > **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
     *
     * Example:
     * ```php
     * $client->customChannelEvents->notifyNewConversation(
     *     new CustomChannelBaseEvent([
     *         'eventId' => 'event_id',
     *         'externalConversationId' => 'external_conversation_id',
     *         'contact' => new CustomChannelContact([
     *             'type' => CustomChannelContactType::User->value,
     *             'externalId' => 'external_id',
     *             'name' => 'name',
     *             'email' => 'email',
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param CustomChannelBaseEvent $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomChannelNotificationResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function notifyNewConversation(CustomChannelBaseEvent $request, ?array $options = null): ?CustomChannelNotificationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_channel_events/notify_new_conversation",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CustomChannelNotificationResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new IntercomException(message: $e->getMessage(), previous: $e);
        }
        throw new IntercomApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Notifies Intercom that a new message was sent in a conversation on your custom channel/platform. This allows Intercom to process the message and trigger any relevant workflow automations.
     * > **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
     *
     * Example:
     * ```php
     * $client->customChannelEvents->notifyNewMessage(
     *     new NotifyNewMessageRequest([
     *         'eventId' => 'event_id',
     *         'externalConversationId' => 'external_conversation_id',
     *         'contact' => new CustomChannelContact([
     *             'type' => CustomChannelContactType::User->value,
     *             'externalId' => 'external_id',
     *             'name' => 'name',
     *             'email' => 'email',
     *         ]),
     *         'body' => 'body',
     *     ]),
     * );
     * ```
     *
     * @param NotifyNewMessageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomChannelNotificationResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function notifyNewMessage(NotifyNewMessageRequest $request, ?array $options = null): ?CustomChannelNotificationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_channel_events/notify_new_message",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CustomChannelNotificationResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new IntercomException(message: $e->getMessage(), previous: $e);
        }
        throw new IntercomApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Notifies Intercom that a user selected a quick reply option in your custom channel/platform. This allows Intercom to process the response and trigger any relevant workflow automations.
     * > **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
     *
     * Example:
     * ```php
     * $client->customChannelEvents->notifyQuickReplySelected(
     *     new NotifyQuickReplySelectedRequest([
     *         'eventId' => 'evt_67890',
     *         'externalConversationId' => 'conv_13579',
     *         'contact' => new CustomChannelContact([
     *             'type' => CustomChannelContactType::User->value,
     *             'externalId' => 'user_003',
     *             'name' => 'Alice Example',
     *             'email' => 'alice@example.com',
     *         ]),
     *         'quickReplyOptionId' => '1234',
     *     ]),
     * );
     * ```
     *
     * @param NotifyQuickReplySelectedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomChannelNotificationResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function notifyQuickReplySelected(NotifyQuickReplySelectedRequest $request, ?array $options = null): ?CustomChannelNotificationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_channel_events/notify_quick_reply_selected",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CustomChannelNotificationResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new IntercomException(message: $e->getMessage(), previous: $e);
        }
        throw new IntercomApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Notifies Intercom that a user provided a response to an attribute collector in your custom channel/platform. This allows Intercom to process the attribute and trigger any relevant workflow automations.
     * > **Note:** This endpoint is currently under managed availability. Please reach out to your accounts team to discuss access and tailored, hands-on support.
     *
     * Example:
     * ```php
     * $client->customChannelEvents->notifyAttributeCollected(
     *     new NotifyAttributeCollectedRequest([
     *         'eventId' => 'event_id',
     *         'externalConversationId' => 'external_conversation_id',
     *         'contact' => new CustomChannelContact([
     *             'type' => CustomChannelContactType::User->value,
     *             'externalId' => 'external_id',
     *             'name' => 'name',
     *             'email' => 'email',
     *         ]),
     *         'attribute' => new CustomChannelAttribute([
     *             'id' => 'id',
     *             'value' => 'value',
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param NotifyAttributeCollectedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomChannelNotificationResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function notifyAttributeCollected(NotifyAttributeCollectedRequest $request, ?array $options = null): ?CustomChannelNotificationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_channel_events/notify_attribute_collected",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CustomChannelNotificationResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new IntercomException(message: $e->getMessage(), previous: $e);
        }
        throw new IntercomApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
