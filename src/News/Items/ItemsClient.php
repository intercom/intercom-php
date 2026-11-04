<?php

namespace Intercom\News\Items;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Types\PaginatedResponse;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Types\NewsItemRequest;
use Intercom\News\Types\NewsItem;
use Intercom\News\Items\Requests\FindNewsItemRequest;
use Intercom\News\Items\Requests\UpdateNewsItemRequest;
use Intercom\News\Items\Requests\DeleteNewsItemRequest;
use Intercom\Types\DeletedObject;

class ItemsClient
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
     * You can fetch a list of all news items
     *
     * Example:
     * ```php
     * $client->news->items->list();
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
     * @return ?PaginatedResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function list(?array $options = null): ?PaginatedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "news/news_items",
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
                return PaginatedResponse::fromJson($json);
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
     * You can create a news item
     *
     * Example:
     * ```php
     * $client->news->items->create(
     *     new NewsItemRequest([
     *         'title' => 'Halloween is here!',
     *         'body' => '<p>New costumes in store for this spooky season</p>',
     *         'senderId' => 991267834,
     *         'state' => NewsItemRequestState::Live->value,
     *         'deliverSilently' => true,
     *         'labels' => [
     *             'Product',
     *             'Update',
     *             'New',
     *         ],
     *         'reactions' => [
     *             '😆',
     *             '😅',
     *         ],
     *         'newsfeedAssignments' => [
     *             new NewsfeedAssignment([
     *                 'newsfeedId' => 53,
     *                 'publishedAt' => 1664638214,
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param NewsItemRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?NewsItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(NewsItemRequest $request, ?array $options = null): ?NewsItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "news/news_items",
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
                return NewsItem::fromJson($json);
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
     * You can fetch the details of a single news item.
     *
     * Example:
     * ```php
     * $client->news->items->find(
     *     new FindNewsItemRequest([
     *         'newsItemId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param FindNewsItemRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?NewsItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindNewsItemRequest $request, ?array $options = null): ?NewsItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "news/news_items/" . RawClient::encodePathParam($request->getNewsItemId()),
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
                return NewsItem::fromJson($json);
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
     * Example:
     * ```php
     * $client->news->items->update(
     *     new UpdateNewsItemRequest([
     *         'newsItemId' => 1,
     *         'body' => new NewsItemRequest([
     *             'title' => 'Christmas is here!',
     *             'body' => '<p>New gifts in store for the jolly season</p>',
     *             'senderId' => 991267845,
     *             'reactions' => [
     *                 '😝',
     *                 '😂',
     *             ],
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param UpdateNewsItemRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?NewsItem
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateNewsItemRequest $request, ?array $options = null): ?NewsItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "news/news_items/" . RawClient::encodePathParam($request->getNewsItemId()),
                    method: HttpMethod::PUT,
                    body: $request->getBody(),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return NewsItem::fromJson($json);
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
     * You can delete a single news item.
     *
     * Example:
     * ```php
     * $client->news->items->delete(
     *     new DeleteNewsItemRequest([
     *         'newsItemId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param DeleteNewsItemRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeletedObject
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function delete(DeleteNewsItemRequest $request, ?array $options = null): ?DeletedObject
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "news/news_items/" . RawClient::encodePathParam($request->getNewsItemId()),
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
                return DeletedObject::fromJson($json);
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
