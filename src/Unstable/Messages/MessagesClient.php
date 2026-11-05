<?php

namespace Intercom\Unstable\Messages;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\Messages\Types\Message;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\Messages\Requests\GetWhatsAppMessageStatusRequest;
use Intercom\Unstable\Types\WhatsappMessageStatusList;

class MessagesClient
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
     * You can create a message that has been initiated by an admin. The conversation can be either an in-app message, an email, sms or whatsapp.
     *
     * > 🚧 Sending for visitors
     * >
     * > There can be a short delay between when a contact is created and when a contact becomes available to be messaged through the API. A 404 Not Found error will be returned in this case.
     *
     * This will return the Message model that has been created.
     *
     * > 🚧 Retrieving Associated Conversations
     * >
     * > As this is a message, there will be no conversation present until the contact responds. Once they do, you will have to search for a contact's conversations with the id of the message.
     *
     * Example:
     * ```php
     * $client->unstable->messages->createMessage(
     *     [
     *         'from' => [
     *             'type' => "user",
     *             'id' => "6762f2341bb69f9f2193bc17",
     *         ],
     *         'body' => "heyy",
     *         'referer' => "https://twitter.com/bob",
     *     ],
     * );
     * ```
     *
     * @param (
     *    mixed
     * )|null $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Message
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createMessage(mixed $request = null, ?array $options = null): ?Message
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "messages",
                    method: HttpMethod::POST,
                    body: $request ? JsonSerializer::serializeUnion($request, new Union('mixed', 'null')) : null,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Message::fromJson($json);
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
     * Retrieves statuses of messages sent from the Outbound module. Currently, this API only supports WhatsApp messages.
     *
     *
     * This endpoint returns paginated status events for WhatsApp messages sent via the Outbound module, providing
     * information about delivery state and related message details.
     *
     * Example:
     * ```php
     * $client->unstable->messages->getWhatsAppMessageStatus(
     *     new GetWhatsAppMessageStatusRequest([
     *         'rulesetId' => 'ruleset_id',
     *         'perPage' => 1,
     *         'startingAfter' => 'starting_after',
     *     ]),
     * );
     * ```
     *
     * @param GetWhatsAppMessageStatusRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WhatsappMessageStatusList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function getWhatsAppMessageStatus(GetWhatsAppMessageStatusRequest $request, ?array $options = null): ?WhatsappMessageStatusList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['ruleset_id'] = $request->getRulesetId();
        if ($request->getPerPage() != null) {
            $query['per_page'] = $request->getPerPage();
        }
        if ($request->getStartingAfter() != null) {
            $query['starting_after'] = $request->getStartingAfter();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "messages/status",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return WhatsappMessageStatusList::fromJson($json);
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
