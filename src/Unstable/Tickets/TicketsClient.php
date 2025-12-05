<?php

namespace Intercom\Unstable\Tickets;

use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\Tickets\Requests\ReplyTicketRequest;
use Intercom\Unstable\Types\TicketReply;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\Tickets\Requests\EnqueueCreateTicketRequest;
use Intercom\Unstable\Jobs\Types\Jobs;
use Intercom\Unstable\Tickets\Requests\GetTicketRequest;
use Intercom\Unstable\Tickets\Types\Ticket;
use Intercom\Unstable\Tickets\Requests\UpdateTicketRequest;
use Intercom\Unstable\Tickets\Requests\DeleteTicketRequest;
use Intercom\Unstable\Tickets\Types\DeleteTicketResponse;
use Intercom\Unstable\Types\SearchRequest;
use Intercom\Unstable\Types\TicketList;

class TicketsClient
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
     * You can reply to a ticket with a message from an admin or on behalf of a contact, or with a note for admins.
     *
     * @param ReplyTicketRequest $request
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
    public function replyTicket(ReplyTicketRequest $request, ?array $options = null): TicketReply
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getId()}/reply",
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
     * Enqueues ticket creation for asynchronous processing, returning if the job was enqueued successfully to be processed. We attempt to perform a best-effort validation on inputs before tasks are enqueued. If the given parameters are incorrect, we won't enqueue the job.
     *
     * @param EnqueueCreateTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Jobs
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function enqueueCreateTicket(EnqueueCreateTicketRequest $request, ?array $options = null): Jobs
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/enqueue",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Jobs::fromJson($json);
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
     * @param GetTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Ticket
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function getTicket(GetTicketRequest $request, ?array $options = null): ?Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getId()}",
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
     * @return ?Ticket
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateTicket(UpdateTicketRequest $request, ?array $options = null): ?Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getId()}",
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
     * You can delete a ticket using the Intercom provided ID.
     *
     * @param DeleteTicketRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DeleteTicketResponse
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteTicket(DeleteTicketRequest $request, ?array $options = null): DeleteTicketResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "tickets/{$request->getId()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DeleteTicketResponse::fromJson($json);
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
     * The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.
     *
     * | Field                                     | Type                                                                                     |
     * | :---------------------------------------- | :--------------------------------------------------------------------------------------- |
     * | id                                        | String                                                                                   |
     * | created_at                                | Date (UNIX timestamp)                                                                    |
     * | updated_at                                | Date (UNIX timestamp)                                                                    |
     * | title                           | String                                                                                   |
     * | description                     | String                                                                                   |
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
     * {% admonition type="info" name="Searching by Category" %}
     * When searching for tickets by the **`category`** field, specific terms must be used instead of the category names:
     * * For **Customer** category tickets, use the term `request`.
     * * For **Back-office** category tickets, use the term `task`.
     * * For **Tracker** category tickets, use the term `tracker`.
     * {% /admonition %}
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
    public function searchTickets(SearchRequest $request, ?array $options = null): TicketList
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
