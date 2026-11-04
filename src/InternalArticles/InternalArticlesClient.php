<?php

namespace Intercom\InternalArticles;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Types\InternalArticleList;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Types\CreateInternalArticleRequest;
use Intercom\InternalArticles\Types\InternalArticleListItem;
use Intercom\InternalArticles\Requests\RetrieveInternalArticleRequest;
use Intercom\InternalArticles\Requests\UpdateInternalArticleRequestBody;
use Intercom\InternalArticles\Requests\DeleteInternalArticleRequest;
use Intercom\Types\DeletedInternalArticleObject;
use Intercom\InternalArticles\Requests\SearchInternalArticlesRequest;
use Intercom\InternalArticles\Types\InternalArticleSearchResponse;

class InternalArticlesClient
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
     * You can fetch a list of all internal articles by making a GET request to `https://api.intercom.io/internal_articles`.
     *
     * Example:
     * ```php
     * $client->internalArticles->listInternalArticles();
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
     * @return ?InternalArticleList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listInternalArticles(?array $options = null): ?InternalArticleList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles",
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
                return InternalArticleList::fromJson($json);
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
     * You can create a new internal article by making a POST request to `https://api.intercom.io/internal_articles`.
     *
     * Example:
     * ```php
     * $client->internalArticles->createInternalArticle(
     *     new CreateInternalArticleRequest([
     *         'title' => 'Thanks for everything',
     *         'body' => 'Body of the Article',
     *         'authorId' => 991266252,
     *         'ownerId' => 991266252,
     *     ]),
     * );
     * ```
     *
     * @param ?CreateInternalArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InternalArticleListItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createInternalArticle(?CreateInternalArticleRequest $request = null, ?array $options = null): ?InternalArticleListItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles",
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
                return InternalArticleListItem::fromJson($json);
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
     * You can fetch the details of a single internal article by making a GET request to `https://api.intercom.io/internal_articles/<id>`.
     *
     * Example:
     * ```php
     * $client->internalArticles->retrieveInternalArticle(
     *     new RetrieveInternalArticleRequest([
     *         'internalArticleId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param RetrieveInternalArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InternalArticleListItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function retrieveInternalArticle(RetrieveInternalArticleRequest $request, ?array $options = null): ?InternalArticleListItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles/" . RawClient::encodePathParam($request->getInternalArticleId()),
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
                return InternalArticleListItem::fromJson($json);
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
     * You can update the details of a single internal article by making a PUT request to `https://api.intercom.io/internal_articles/<id>`.
     *
     * Example:
     * ```php
     * $client->internalArticles->updateInternalArticle(
     *     new UpdateInternalArticleRequestBody([
     *         'internalArticleId' => 1,
     *         'title' => 'Christmas is here!',
     *         'body' => '<p>New gifts in store for the jolly season</p>',
     *     ]),
     * );
     * ```
     *
     * @param UpdateInternalArticleRequestBody $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InternalArticleListItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateInternalArticle(UpdateInternalArticleRequestBody $request, ?array $options = null): ?InternalArticleListItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles/" . RawClient::encodePathParam($request->getInternalArticleId()),
                    method: HttpMethod::PUT,
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
                return InternalArticleListItem::fromJson($json);
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
     * You can delete a single internal article by making a DELETE request to `https://api.intercom.io/internal_articles/<id>`.
     *
     * Example:
     * ```php
     * $client->internalArticles->deleteInternalArticle(
     *     new DeleteInternalArticleRequest([
     *         'internalArticleId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param DeleteInternalArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeletedInternalArticleObject
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteInternalArticle(DeleteInternalArticleRequest $request, ?array $options = null): ?DeletedInternalArticleObject
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles/" . RawClient::encodePathParam($request->getInternalArticleId()),
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
                return DeletedInternalArticleObject::fromJson($json);
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
     * You can search for internal articles by making a GET request to `https://api.intercom.io/internal_articles/search`.
     *
     * Example:
     * ```php
     * $client->internalArticles->searchInternalArticles(
     *     new SearchInternalArticlesRequest([
     *         'folderId' => 'folder_id',
     *     ]),
     * );
     * ```
     *
     * @param SearchInternalArticlesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InternalArticleSearchResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function searchInternalArticles(SearchInternalArticlesRequest $request = new SearchInternalArticlesRequest(), ?array $options = null): ?InternalArticleSearchResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getFolderId() != null) {
            $query['folder_id'] = $request->getFolderId();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "internal_articles/search",
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
                return InternalArticleSearchResponse::fromJson($json);
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
