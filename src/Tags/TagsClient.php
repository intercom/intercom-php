<?php

namespace Intercom\Tags;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Tags\Requests\TagContactRequest;
use Intercom\Tags\Types\Tag;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Tags\Requests\UntagContactRequest;
use Intercom\Tags\Requests\TagConversationRequest;
use Intercom\Tags\Requests\UntagConversationRequest;
use Intercom\Types\TagList;
use Intercom\Types\CreateOrUpdateTagRequest;
use Intercom\Types\TagCompanyRequest;
use Intercom\Types\UntagCompanyRequest;
use Intercom\Types\TagMultipleUsersRequest;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use Intercom\Tags\Requests\FindTagRequest;
use Intercom\Tags\Requests\DeleteTagRequest;
use Intercom\Tags\Requests\TagTicketRequest;
use Intercom\Tags\Requests\UntagTicketRequest;

class TagsClient
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
     * You can tag a specific contact. This will return a tag object for the tag that was added to the contact.
     *
     * Example:
     * ```php
     * $client->tags->tagContact(
     *     new TagContactRequest([
     *         'contactId' => '63a07ddf05a32042dffac965',
     *         'tagId' => '7522907',
     *     ]),
     * );
     * ```
     *
     * @param TagContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function tagContact(TagContactRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getContactId()) . "/tags",
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
                return Tag::fromJson($json);
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
     * You can remove tag from a specific contact. This will return a tag object for the tag that was removed from the contact.
     *
     * Example:
     * ```php
     * $client->tags->untagContact(
     *     new UntagContactRequest([
     *         'contactId' => '63a07ddf05a32042dffac965',
     *         'tagId' => '7522907',
     *     ]),
     * );
     * ```
     *
     * @param UntagContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function untagContact(UntagContactRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getContactId()) . "/tags/" . RawClient::encodePathParam($request->getTagId()),
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
                return Tag::fromJson($json);
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
     * You can tag a specific conversation. This will return a tag object for the tag that was added to the conversation.
     *
     * Example:
     * ```php
     * $client->tags->tagConversation(
     *     new TagConversationRequest([
     *         'conversationId' => '64619700005694',
     *         'tagId' => '7522907',
     *         'adminId' => '780',
     *     ]),
     * );
     * ```
     *
     * @param TagConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function tagConversation(TagConversationRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getConversationId()) . "/tags",
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
                return Tag::fromJson($json);
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
     * You can remove tag from a specific conversation. This will return a tag object for the tag that was removed from the conversation.
     *
     * Example:
     * ```php
     * $client->tags->untagConversation(
     *     new UntagConversationRequest([
     *         'conversationId' => '64619700005694',
     *         'tagId' => '7522907',
     *         'adminId' => '123',
     *     ]),
     * );
     * ```
     *
     * @param UntagConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function untagConversation(UntagConversationRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getConversationId()) . "/tags/" . RawClient::encodePathParam($request->getTagId()),
                    method: HttpMethod::DELETE,
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
                return Tag::fromJson($json);
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
     * You can fetch a list of all tags for a given workspace.
     *
     *
     * Example:
     * ```php
     * $client->tags->list();
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
     * @return ?TagList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function list(?array $options = null): ?TagList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tags",
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
                return TagList::fromJson($json);
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
     * You can use this endpoint to perform the following operations:
     *
     *   **1. Create a new tag:** You can create a new tag by passing in the tag name as specified in "Create or Update Tag Request Payload" described below.
     *
     *   **2. Update an existing tag:** You can update an existing tag by passing the id of the tag as specified in "Create or Update Tag Request Payload" described below.
     *
     *   **3. Tag Companies:** You can tag single company or a list of companies. You can tag a company by passing in the tag name and the company details as specified in "Tag Company Request Payload" described below. Also, if the tag doesn't exist then a new one will be created automatically.
     *
     *   **4. Untag Companies:** You can untag a single company or a list of companies. You can untag a company by passing in the tag id and the company details as specified in "Untag Company Request Payload" described below.
     *
     *   **5. Tag Multiple Users:** You can tag a list of users. You can tag the users by passing in the tag name and the user details as specified in "Tag Users Request Payload" described below.
     *
     * Each operation will return a tag object.
     *
     * Example:
     * ```php
     * $client->tags->create(
     *     new CreateOrUpdateTagRequest([
     *         'name' => 'test',
     *     ]),
     * );
     * ```
     *
     * @param (
     *    CreateOrUpdateTagRequest
     *   |TagCompanyRequest
     *   |UntagCompanyRequest
     *   |TagMultipleUsersRequest
     * ) $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(CreateOrUpdateTagRequest|TagCompanyRequest|UntagCompanyRequest|TagMultipleUsersRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tags",
                    method: HttpMethod::POST,
                    body: JsonSerializer::serializeUnion($request, new Union(CreateOrUpdateTagRequest::class, TagCompanyRequest::class, UntagCompanyRequest::class, TagMultipleUsersRequest::class)),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Tag::fromJson($json);
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
     * You can fetch the details of tags that are on the workspace by their id.
     * This will return a tag object.
     *
     * Example:
     * ```php
     * $client->tags->find(
     *     new FindTagRequest([
     *         'tagId' => '123',
     *     ]),
     * );
     * ```
     *
     * @param FindTagRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindTagRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tags/" . RawClient::encodePathParam($request->getTagId()),
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
                return Tag::fromJson($json);
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
     * You can delete the details of tags that are on the workspace by passing in the id.
     *
     * Example:
     * ```php
     * $client->tags->delete(
     *     new DeleteTagRequest([
     *         'tagId' => '123',
     *     ]),
     * );
     * ```
     *
     * @param DeleteTagRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function delete(DeleteTagRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tags/" . RawClient::encodePathParam($request->getTagId()),
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * You can tag a specific ticket. This will return a tag object for the tag that was added to the ticket.
     *
     * Example:
     * ```php
     * $client->tags->tagTicket(
     *     new TagTicketRequest([
     *         'ticketId' => '64619700005694',
     *         'tagId' => '7522907',
     *         'adminId' => '780',
     *     ]),
     * );
     * ```
     *
     * @param TagTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function tagTicket(TagTicketRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/" . RawClient::encodePathParam($request->getTicketId()) . "/tags",
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
                return Tag::fromJson($json);
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
     * You can remove tag from a specific ticket. This will return a tag object for the tag that was removed from the ticket.
     *
     * Example:
     * ```php
     * $client->tags->untagTicket(
     *     new UntagTicketRequest([
     *         'ticketId' => '64619700005694',
     *         'tagId' => '7522907',
     *         'adminId' => '123',
     *     ]),
     * );
     * ```
     *
     * @param UntagTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Tag
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function untagTicket(UntagTicketRequest $request, ?array $options = null): ?Tag
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/" . RawClient::encodePathParam($request->getTicketId()) . "/tags/" . RawClient::encodePathParam($request->getTagId()),
                    method: HttpMethod::DELETE,
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
                return Tag::fromJson($json);
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
