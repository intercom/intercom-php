<?php

namespace Intercom\Visitors;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Visitors\Requests\FindVisitorRequest;
use Intercom\Types\Visitor;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Types\UpdateVisitorRequestWithId;
use Intercom\Types\UpdateVisitorRequestWithUserId;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use Intercom\Visitors\Requests\MergeVisitorToContactRequest;
use Intercom\Contacts\Types\Contact;

class VisitorsClient
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
     * You can fetch the details of a single visitor.
     *
     * Example:
     * ```php
     * $client->visitors->find(
     *     new FindVisitorRequest([
     *         'userId' => 'user_id',
     *     ]),
     * );
     * ```
     *
     * @param FindVisitorRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Visitor
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindVisitorRequest $request, ?array $options = null): ?Visitor
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['user_id'] = $request->getUserId();
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "visitors",
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
                return Visitor::fromJson($json);
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
     * Sending a PUT request to `/visitors` will result in an update of an existing Visitor.
     *
     * **Option 1.** You can update a visitor by passing in the `user_id` of the visitor in the Request body.
     *
     * **Option 2.** You can update a visitor by passing in the `id` of the visitor in the Request body.
     *
     * Example:
     * ```php
     * $client->visitors->update(
     *     new UpdateVisitorRequestWithId([
     *         'id' => '6762f30c1bb69f9f2193bc5e',
     *         'name' => 'Gareth Bale',
     *     ]),
     * );
     * ```
     *
     * @param (
     *    UpdateVisitorRequestWithId
     *   |UpdateVisitorRequestWithUserId
     * ) $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Visitor
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateVisitorRequestWithId|UpdateVisitorRequestWithUserId $request, ?array $options = null): ?Visitor
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "visitors",
                    method: HttpMethod::PUT,
                    body: JsonSerializer::serializeUnion($request, new Union(UpdateVisitorRequestWithId::class, UpdateVisitorRequestWithUserId::class)),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Visitor::fromJson($json);
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
     * You can merge a Visitor to a Contact of role type `lead` or `user`.
     *
     * > 📘 What happens upon a visitor being converted?
     * >
     * > If the User exists, then the Visitor will be merged into it, the Visitor deleted and the User returned. If the User does not exist, the Visitor will be converted to a User, with the User identifiers replacing it's Visitor identifiers.
     *
     * Example:
     * ```php
     * $client->unstable->visitors->convertVisitor(
     *     new ConvertVisitorRequest([
     *         'type' => 'user',
     *         'user' => [
     *             'id' => "8a88a590-e1c3-41e2-a502-e0649dbf721c",
     *             'email' => "foo@bar.com",
     *         ],
     *         'visitor' => [
     *             'user_id' => "3ecf64d0-9ed1-4e9f-88e1-da7d6e6782f3",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param MergeVisitorToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Contact
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function mergeToContact(MergeVisitorToContactRequest $request, ?array $options = null): ?Contact
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "visitors/convert",
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
                return Contact::fromJson($json);
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
