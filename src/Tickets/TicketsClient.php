<?php

namespace Intercom\Tickets;

use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Tickets\Requests\ReplyToTicketRequest;
use Intercom\Types\TicketReply;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Types\CreateTicketRequest;
use Intercom\Tickets\Types\Ticket;
use Intercom\Tickets\Requests\FindTicketRequest;
use Intercom\Tickets\Requests\UpdateTicketRequest;
use Intercom\Types\SearchRequest;
use Intercom\Core\Pagination\Pager;
use Intercom\Core\Pagination\CursorPager;
use Intercom\Core\Pagination\PaginationHelper;
use Intercom\Types\TicketList;

class TicketsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
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
     * You can reply to a ticket with a message from an admin or on behalf of a contact, or with a note for admins.
     *
     * @param ReplyToTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return TicketReply
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function reply(ReplyToTicketRequest $request, ?array $options = null): TicketReply
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getTicketId()}/reply",
                    method: HttpMethod::POST,
                    body: $request->getBody(),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return TicketReply::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new IntercomException(message: $e->getMessage(), previous: $e);
            }
            throw new IntercomApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * You can create a new ticket.
     *
     * @param CreateTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Ticket
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(CreateTicketRequest $request, ?array $options = null): Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Ticket::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new IntercomException(message: $e->getMessage(), previous: $e);
            }
            throw new IntercomApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * You can fetch the details of a single ticket.
     *
     * @param FindTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Ticket
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function get(FindTicketRequest $request, ?array $options = null): Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getTicketId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Ticket::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new IntercomException(message: $e->getMessage(), previous: $e);
            }
            throw new IntercomApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * You can update a ticket.
     *
     * @param UpdateTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Ticket
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateTicketRequest $request, ?array $options = null): Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getTicketId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Ticket::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new IntercomException(message: $e->getMessage(), previous: $e);
            }
            throw new IntercomApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
     * You can search for multiple tickets by the value of their attributes in order to fetch exactly which ones you want.
     *
     * To search for tickets, you send a `POST` request to `https://api.intercom.io/tickets/search`.
     *
     * This will accept a query object in the body which will define your filters.
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `20` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiples there can be:
     * - There's a limit of max 2 nested filters
     * - There's a limit of max 15 filters for each AND or OR group
     *
     * ### Accepted Fields
     *
     * Most keys listed as part of the Ticket model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foobar"`).
     *
     * | Field                                     | Type                                                                                     |
     * | :---------------------------------------- | :--------------------------------------------------------------------------------------- |
     * | id                                        | String                                                                                   |
     * | created_at                                | Date (UNIX timestamp)                                                                    |
     * | updated_at                                | Date (UNIX timestamp)                                                                    |
     * | _default_title_                           | String                                                                                   |
     * | _default_description_                     | String                                                                                   |
     * | category                                  | String                                                                                   |
     * | ticket_type_id                            | String                                                                                   |
     * | contact_ids                               | String                                                                                   |
     * | teammate_ids                              | String                                                                                   |
     * | admin_assignee_id                         | String                                                                                   |
     * | team_assignee_id                          | String                                                                                   |
     * | open                                      | Boolean                                                                                  |
     * | state                                     | String                                                                                   |
     * | snoozed_until                             | Date (UNIX timestamp)                                                                    |
     * | ticket_attribute.{id}                     | String or Boolean or Date (UNIX timestamp) or Float or Integer                           |
     *
     * ### Accepted Operators
     *
     * {% admonition type="info" name="Searching based on `created_at`" %}
     *   You may use the `<=` or `>=` operators to search by `created_at`.
     * {% /admonition %}
     *
     * The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).
     *
     * | Operator | Valid Types                    | Description                                                  |
     * | :------- | :----------------------------- | :----------------------------------------------------------- |
     * | =        | All                            | Equals                                                       |
     * | !=       | All                            | Doesn't Equal                                                |
     * | IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
     * | NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
     * | >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
     * | <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
     * | ~        | String                         | Contains                                                     |
     * | !~       | String                         | Doesn't Contain                                              |
     * | ^        | String                         | Starts With                                                  |
     * | $        | String                         | Ends With                                                    |
     *
     * @param SearchRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Ticket>
     */
    public function search(SearchRequest $request, ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (SearchRequest $request) => $this->_search($request, $options),
            setCursor: function (SearchRequest $request, ?string $cursor) {
                PaginationHelper::setDeep($request, ["pagination", "startingAfter"], $cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (TicketList $response) => $response?->getPages()?->getNext()?->getStartingAfter() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (TicketList $response) => $response?->getTickets() ?? [],
        );
    }

    /**
     * You can search for multiple tickets by the value of their attributes in order to fetch exactly which ones you want.
     *
     * To search for tickets, you send a `POST` request to `https://api.intercom.io/tickets/search`.
     *
     * This will accept a query object in the body which will define your filters.
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `20` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiples there can be:
     * - There's a limit of max 2 nested filters
     * - There's a limit of max 15 filters for each AND or OR group
     *
     * ### Accepted Fields
     *
     * Most keys listed as part of the Ticket model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foobar"`).
     *
     * | Field                                     | Type                                                                                     |
     * | :---------------------------------------- | :--------------------------------------------------------------------------------------- |
     * | id                                        | String                                                                                   |
     * | created_at                                | Date (UNIX timestamp)                                                                    |
     * | updated_at                                | Date (UNIX timestamp)                                                                    |
     * | _default_title_                           | String                                                                                   |
     * | _default_description_                     | String                                                                                   |
     * | category                                  | String                                                                                   |
     * | ticket_type_id                            | String                                                                                   |
     * | contact_ids                               | String                                                                                   |
     * | teammate_ids                              | String                                                                                   |
     * | admin_assignee_id                         | String                                                                                   |
     * | team_assignee_id                          | String                                                                                   |
     * | open                                      | Boolean                                                                                  |
     * | state                                     | String                                                                                   |
     * | snoozed_until                             | Date (UNIX timestamp)                                                                    |
     * | ticket_attribute.{id}                     | String or Boolean or Date (UNIX timestamp) or Float or Integer                           |
     *
     * ### Accepted Operators
     *
     * {% admonition type="info" name="Searching based on `created_at`" %}
     *   You may use the `<=` or `>=` operators to search by `created_at`.
     * {% /admonition %}
     *
     * The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type  (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).
     *
     * | Operator | Valid Types                    | Description                                                  |
     * | :------- | :----------------------------- | :----------------------------------------------------------- |
     * | =        | All                            | Equals                                                       |
     * | !=       | All                            | Doesn't Equal                                                |
     * | IN       | All                            | In  Shortcut for `OR` queries  Values most be in Array       |
     * | NIN      | All                            | Not In  Shortcut for `OR !` queries  Values must be in Array |
     * | >        | Integer  Date (UNIX Timestamp) | Greater (or equal) than                                      |
     * | <       | Integer  Date (UNIX Timestamp) | Lower (or equal) than                                        |
     * | ~        | String                         | Contains                                                     |
     * | !~       | String                         | Doesn't Contain                                              |
     * | ^        | String                         | Starts With                                                  |
     * | $        | String                         | Ends With                                                    |
     *
     * @param SearchRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return TicketList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _search(SearchRequest $request, ?array $options = null): TicketList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return TicketList::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new IntercomException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new IntercomException(message: $e->getMessage(), previous: $e);
            }
            throw new IntercomApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
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
