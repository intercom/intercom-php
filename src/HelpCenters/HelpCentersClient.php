<?php

namespace Intercom\HelpCenters;

use Intercom\HelpCenters\Collections\CollectionsClient;
use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\HelpCenters\Requests\FindHelpCenterRequest;
use Intercom\HelpCenter\Types\HelpCenter;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\HelpCenters\Requests\ListHelpCentersRequest;
use Intercom\Core\Pagination\Pager;
use Intercom\Core\Pagination\OffsetPager;
use Intercom\HelpCenter\Types\HelpCenterList;

class HelpCentersClient
{
    /**
     * @var CollectionsClient $collections
     */
    public CollectionsClient $collections;

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
        $this->collections = new CollectionsClient($this->client, $this->options);
    }

    /**
     * You can fetch the details of a single Help Center by making a GET request to `https://api.intercom.io/help_center/help_center/<id>`.
     *
     * Example:
     * ```php
     * $client->helpCenters->find(
     *     new FindHelpCenterRequest([
     *         'helpCenterId' => 1,
     *     ]),
     * );
     * ```
     *
     * @param FindHelpCenterRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?HelpCenter
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindHelpCenterRequest $request, ?array $options = null): ?HelpCenter
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "help_center/help_centers/" . RawClient::encodePathParam($request->getHelpCenterId()),
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
                return HelpCenter::fromJson($json);
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
     * You can list all Help Centers by making a GET request to `https://api.intercom.io/help_center/help_centers`.
     *
     * Example:
     * ```php
     * $client->helpCenters->list(
     *     new ListHelpCentersRequest([
     *         'page' => 1,
     *         'perPage' => 1,
     *     ]),
     * );
     * ```
     *
     * @param ListHelpCentersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<HelpCenter>
     */
    public function list(ListHelpCentersRequest $request = new ListHelpCentersRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListHelpCentersRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListHelpCentersRequest $request) => $request?->getPage() ?? 0,
            setOffset: function (ListHelpCentersRequest $request, int $offset) {
                $request->setPage($offset);
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?HelpCenterList $response) => $response?->getData() ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * You can list all Help Centers by making a GET request to `https://api.intercom.io/help_center/help_centers`.
     *
     * @param ListHelpCentersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?HelpCenterList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _list(ListHelpCentersRequest $request = new ListHelpCentersRequest(), ?array $options = null): ?HelpCenterList
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
                    path: "help_center/help_centers",
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
                return HelpCenterList::fromJson($json);
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
