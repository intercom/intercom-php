<?php

namespace Intercom\Unstable\SubscriptionTypes;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\SubscriptionTypes\Requests\AttachSubscriptionTypeToContactRequest;
use Intercom\Unstable\SubscriptionTypes\Types\SubscriptionType;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\SubscriptionTypes\Requests\DetachSubscriptionTypeToContactRequest;
use Intercom\Unstable\Types\SubscriptionTypeList;

class SubscriptionTypesClient
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
     * You can add a specific subscription to a contact. In Intercom, we have two different subscription types based on user consent - opt-out and opt-in:
     *
     *   1.Attaching a contact to an opt-out subscription type will opt that user out from receiving messages related to that subscription type.
     *
     *   2.Attaching a contact to an opt-in subscription type will opt that user in to receiving messages related to that subscription type.
     *
     * This will return a subscription type model for the subscription type that was added to the contact.
     *
     * Example:
     * ```php
     * $client->contacts->attachSubscription(
     *     new AttachSubscriptionToContactRequest([
     *         'contactId' => '63a07ddf05a32042dffac965',
     *         'subscriptionId' => '37846',
     *         'consentType' => 'opt_in',
     *     ]),
     * );
     * ```
     *
     * @param AttachSubscriptionTypeToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriptionType
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function attachSubscriptionTypeToContact(AttachSubscriptionTypeToContactRequest $request, ?array $options = null): ?SubscriptionType
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getContactId()) . "/subscriptions",
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
                return SubscriptionType::fromJson($json);
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
     * You can remove a specific subscription from a contact. This will return a subscription type model for the subscription type that was removed from the contact.
     *
     * Example:
     * ```php
     * $client->unstable->subscriptionTypes->detachSubscriptionTypeToContact(
     *     new DetachSubscriptionTypeToContactRequest([
     *         'contactId' => '63a07ddf05a32042dffac965',
     *         'id' => '37846',
     *     ]),
     * );
     * ```
     *
     * @param DetachSubscriptionTypeToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriptionType
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function detachSubscriptionTypeToContact(DetachSubscriptionTypeToContactRequest $request, ?array $options = null): ?SubscriptionType
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getContactId()) . "/subscriptions/" . RawClient::encodePathParam($request->getId()),
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriptionType::fromJson($json);
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
     * You can list all subscription types. A list of subscription type objects will be returned.
     *
     * Example:
     * ```php
     * $client->subscriptionTypes->list();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriptionTypeList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listSubscriptionTypes(?array $options = null): ?SubscriptionTypeList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "subscription_types",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriptionTypeList::fromJson($json);
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
