<?php

namespace Intercom\Articles;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Articles\Requests\ListArticlesRequest;
use Intercom\Core\Pagination\Pager;
use Intercom\Articles\Types\ArticleListItem;
use Intercom\Core\Pagination\OffsetPager;
use Intercom\Types\ArticleList;
use Intercom\Types\CreateArticleRequest;
use Intercom\Articles\Types\Article;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Articles\Requests\FindArticleRequest;
use Intercom\Articles\Requests\UpdateArticleRequest;
use Intercom\Articles\Requests\DeleteArticleRequest;
use Intercom\Types\DeletedArticleObject;
use Intercom\Articles\Requests\SearchArticlesRequest;
use Intercom\Articles\Types\ArticleSearchResponse;

class ArticlesClient
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
     * You can fetch a list of all articles by making a GET request to `https://api.intercom.io/articles`.
     *
     * > 📘 How are the articles sorted and ordered?
     * >
     * > Articles will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated articles first.
     *
     * Example:
     * ```php
     * $client->articles->list(
     *     new ListArticlesRequest([
     *         'page' => 1,
     *         'perPage' => 1,
     *     ]),
     * );
     * ```
     *
     * @param ListArticlesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ArticleListItem>
     */
    public function list(ListArticlesRequest $request = new ListArticlesRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListArticlesRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListArticlesRequest $request) => $request?->getPage() ?? 0,
            setOffset: function (ListArticlesRequest $request, int $offset) {
                $request->setPage($offset);
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ArticleList $response) => $response?->getData() ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * You can create a new article by making a POST request to `https://api.intercom.io/articles`.
     *
     * Example:
     * ```php
     * $client->articles->create(
     *     new CreateArticleRequest([
     *         'title' => 'Thanks for everything',
     *         'description' => 'Description of the Article',
     *         'body' => 'Body of the Article',
     *         'authorId' => 991267497,
     *         'state' => CreateArticleRequestState::Published->value,
     *         'parentId' => 145,
     *         'parentType' => CreateArticleRequestParentType::Collection->value,
     *         'translatedContent' => new ArticleTranslatedContent([
     *             'fr' => new ArticleContent([
     *                 'title' => 'Merci pour tout',
     *                 'description' => "Description de l'article",
     *                 'body' => "Corps de l'article",
     *                 'authorId' => 991267497,
     *                 'state' => ArticleContentState::Published->value,
     *             ]),
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param ?CreateArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Article
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(?CreateArticleRequest $request = null, ?array $options = null): ?Article
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles",
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
                return Article::fromJson($json);
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
     * You can fetch the details of a single article by making a GET request to `https://api.intercom.io/articles/<id>`.
     *
     * Example:
     * ```php
     * $client->articles->find(
     *     new FindArticleRequest([
     *         'articleId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param FindArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Article
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindArticleRequest $request, ?array $options = null): ?Article
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles/" . RawClient::encodePathParam($request->getArticleId()),
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
                return Article::fromJson($json);
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
     * You can update the details of a single article by making a PUT request to `https://api.intercom.io/articles/<id>`.
     *
     * Example:
     * ```php
     * $client->articles->update(
     *     new UpdateArticleRequest([
     *         'articleId' => 1,
     *         'title' => 'Christmas is here!',
     *         'body' => '<p>New gifts in store for the jolly season</p>',
     *     ]),
     * );
     * ```
     *
     * @param UpdateArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Article
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateArticleRequest $request, ?array $options = null): ?Article
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles/" . RawClient::encodePathParam($request->getArticleId()),
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
                return Article::fromJson($json);
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
     * You can delete a single article by making a DELETE request to `https://api.intercom.io/articles/<id>`.
     *
     * Example:
     * ```php
     * $client->articles->delete(
     *     new DeleteArticleRequest([
     *         'articleId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param DeleteArticleRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeletedArticleObject
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function delete(DeleteArticleRequest $request, ?array $options = null): ?DeletedArticleObject
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles/" . RawClient::encodePathParam($request->getArticleId()),
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
                return DeletedArticleObject::fromJson($json);
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
     * You can search for articles by making a GET request to `https://api.intercom.io/articles/search`.
     *
     * Example:
     * ```php
     * $client->articles->search(
     *     new SearchArticlesRequest([
     *         'phrase' => 'Getting started',
     *         'state' => 'published',
     *         'helpCenterId' => 1,
     *         'highlight' => true,
     *     ]),
     * );
     * ```
     *
     * @param SearchArticlesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ArticleSearchResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function search(SearchArticlesRequest $request = new SearchArticlesRequest(), ?array $options = null): ?ArticleSearchResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getPhrase() != null) {
            $query['phrase'] = $request->getPhrase();
        }
        if ($request->getState() != null) {
            $query['state'] = $request->getState();
        }
        if ($request->getHelpCenterId() != null) {
            $query['help_center_id'] = $request->getHelpCenterId();
        }
        if ($request->getHighlight() != null) {
            $query['highlight'] = $request->getHighlight();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles/search",
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
                return ArticleSearchResponse::fromJson($json);
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
     * You can fetch a list of all articles by making a GET request to `https://api.intercom.io/articles`.
     *
     * > 📘 How are the articles sorted and ordered?
     * >
     * > Articles will be returned in descending order on the `updated_at` attribute. This means if you need to iterate through results then we'll show the most recently updated articles first.
     *
     * @param ListArticlesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ArticleList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _list(ListArticlesRequest $request = new ListArticlesRequest(), ?array $options = null): ?ArticleList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getPage() != null) {
            $query['page'] = $request->getPage();
        }
        if ($request->getPerPage() != null) {
            $query['per_page'] = $request->getPerPage();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "articles",
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
                return ArticleList::fromJson($json);
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
