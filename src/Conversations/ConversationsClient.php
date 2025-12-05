<?php

namespace Intercom\Conversations;

use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Conversations\Requests\ListConversationsRequest;
use Intercom\Core\Pagination\Pager;
use Intercom\Conversations\Types\Conversation;
use Intercom\Core\Pagination\CursorPager;
use Intercom\Types\ConversationList;
use Intercom\Conversations\Requests\CreateConversationRequest;
use Intercom\Messages\Types\Message;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Conversations\Requests\FindConversationRequest;
use Intercom\Conversations\Requests\UpdateConversationRequest;
use Intercom\Conversations\Requests\DeleteConversationRequest;
use Intercom\Types\ConversationDeleted;
use Intercom\Types\SearchRequest;
use Intercom\Core\Pagination\PaginationHelper;
use Intercom\Conversations\Requests\ReplyToConversationRequest;
use Intercom\Conversations\Requests\ManageConversationPartsRequest;
use Intercom\Conversations\Requests\AttachContactToConversationRequest;
use Intercom\Conversations\Requests\DetachContactFromConversationRequest;
use Intercom\Types\RedactConversationRequest;
use Intercom\Conversations\Requests\ConvertConversationToTicketRequest;
use Intercom\Tickets\Types\Ticket;
use Intercom\Conversations\Requests\AutoAssignConversationRequest;

class ConversationsClient
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
     * You can fetch a list of all conversations.
     *
     * You can optionally request the result page size and the cursor to start after to fetch the result.
     * {% admonition type="warning" name="Pagination" %}
     *   You can use pagination to limit the number of results returned. The default is `20` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Conversation>
     */
    public function list(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListConversationsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListConversationsRequest $request, ?string $cursor) {
                $request->setStartingAfter($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ConversationList $response) => $response?->getPages()?->getNext()?->getStartingAfter() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ConversationList $response) => $response?->getConversations() ?? [],
        );
    }

    /**
     * You can create a conversation that has been initiated by a contact (ie. user or lead).
     * The conversation can be an in-app message only.
     *
     * {% admonition type="info" name="Sending for visitors" %}
     * You can also send a message from a visitor by specifying their `user_id` or `id` value in the `from` field, along with a `type` field value of `contact`.
     * This visitor will be automatically converted to a contact with a lead role once the conversation is created.
     * {% /admonition %}
     *
     * This will return the Message model that has been created.
     *
     *
     * @param CreateConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Message
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(CreateConversationRequest $request, ?array $options = null): Message
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Message::fromJson($json);
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
     *
     * You can fetch the details of a single conversation.
     *
     * This will return a single Conversation model with all its conversation parts.
     *
     * {% admonition type="warning" name="Hard limit of 500 parts" %}
     * The maximum number of conversation parts that can be returned via the API is 500. If you have more than that we will return the 500 most recent conversation parts.
     * {% /admonition %}
     *
     * For AI agent conversation metadata, please note that you need to have the agent enabled in your workspace, which is a [paid feature](https://www.intercom.com/help/en/articles/8205718-fin-resolutions#h_97f8c2e671).
     *
     * @param FindConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getDisplayAs() != null) {
            $query['display_as'] = $request->getDisplayAs();
        }
        if ($request->getIncludeTranslations() != null) {
            $query['include_translations'] = $request->getIncludeTranslations();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     *
     * You can update an existing conversation.
     *
     * {% admonition type="info" name="Replying and other actions" %}
     * If you want to reply to a coveration or take an action such as assign, unassign, open, close or snooze, take a look at the reply and manage endpoints.
     * {% /admonition %}
     *
     * {% admonition type="info" %}
     *   This endpoint handles both **conversation updates** and **custom object associations**.
     *
     *   See _`update a conversation with an association to a custom object instance`_ in the request/response examples to see the custom object association format.
     * {% /admonition %}
     *
     *
     * @param UpdateConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getDisplayAs() != null) {
            $query['display_as'] = $request->getDisplayAs();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}",
                    method: HttpMethod::PUT,
                    query: $query,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can delete a single conversation.
     *
     * @param DeleteConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ConversationDeleted
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteConversation(DeleteConversationRequest $request, ?array $options = null): ConversationDeleted
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ConversationDeleted::fromJson($json);
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
     * You can search for multiple conversations by the value of their attributes in order to fetch exactly which ones you want.
     *
     * To search for conversations, you need to send a `POST` request to `https://api.intercom.io/conversations/search`.
     *
     * This will accept a query object in the body which will define your filters in order to search for conversations.
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `20` results per page and maximum is `150`.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiple's there can be:
     * - There's a limit of max 2 nested filters
     * - There's a limit of max 15 filters for each AND or OR group
     *
     * ### Accepted Fields
     *
     * Most keys listed in the conversation model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
     * The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.
     *
     * | Field                                     | Type                                                                                                                                                   |
     * | :---------------------------------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------- |
     * | id                                        | String                                                                                                                                                 |
     * | created_at                                | Date (UNIX timestamp)                                                                                                                                  |
     * | updated_at                                | Date (UNIX timestamp)                                                                                                                                  |
     * | source.type                               | String<br>Accepted fields are `conversation`, `email`, `facebook`, `instagram`, `phone_call`, `phone_switch`, `push`, `sms`, `twitter` and `whatsapp`. |
     * | source.id                                 | String                                                                                                                                                 |
     * | source.delivered_as                       | String                                                                                                                                                 |
     * | source.subject                            | String                                                                                                                                                 |
     * | source.body                               | String                                                                                                                                                 |
     * | source.author.id                          | String                                                                                                                                                 |
     * | source.author.type                        | String                                                                                                                                                 |
     * | source.author.name                        | String                                                                                                                                                 |
     * | source.author.email                       | String                                                                                                                                                 |
     * | source.url                                | String                                                                                                                                                 |
     * | contact_ids                               | String                                                                                                                                                 |
     * | teammate_ids                              | String                                                                                                                                                 |
     * | admin_assignee_id                         | String                                                                                                                                                 |
     * | team_assignee_id                          | String                                                                                                                                                 |
     * | channel_initiated                         | String                                                                                                                                                 |
     * | open                                      | Boolean                                                                                                                                                |
     * | read                                      | Boolean                                                                                                                                                |
     * | state                                     | String                                                                                                                                                 |
     * | waiting_since                             | Date (UNIX timestamp)                                                                                                                                  |
     * | snoozed_until                             | Date (UNIX timestamp)                                                                                                                                  |
     * | tag_ids                                   | String                                                                                                                                                 |
     * | priority                                  | String                                                                                                                                                 |
     * | statistics.time_to_assignment             | Integer                                                                                                                                                |
     * | statistics.time_to_admin_reply            | Integer                                                                                                                                                |
     * | statistics.time_to_first_close            | Integer                                                                                                                                                |
     * | statistics.time_to_last_close             | Integer                                                                                                                                                |
     * | statistics.median_time_to_reply           | Integer                                                                                                                                                |
     * | statistics.first_contact_reply_at         | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_assignment_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_admin_reply_at           | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_close_at                 | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_assignment_at             | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_assignment_admin_reply_at | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_contact_reply_at          | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_admin_reply_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_close_at                  | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_closed_by_id              | String                                                                                                                                                 |
     * | statistics.count_reopens                  | Integer                                                                                                                                                |
     * | statistics.count_assignments              | Integer                                                                                                                                                |
     * | statistics.count_conversation_parts       | Integer                                                                                                                                                |
     * | conversation_rating.requested_at          | Date (UNIX timestamp)                                                                                                                                  |
     * | conversation_rating.replied_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | conversation_rating.score                 | Integer                                                                                                                                                |
     * | conversation_rating.remark                | String                                                                                                                                                 |
     * | conversation_rating.contact_id            | String                                                                                                                                                 |
     * | conversation_rating.admin_d               | String                                                                                                                                                 |
     * | ai_agent_participated                     | Boolean                                                                                                                                                |
     * | ai_agent.resolution_state                 | String                                                                                                                                                 |
     * | ai_agent.last_answer_type                 | String                                                                                                                                                 |
     * | ai_agent.rating                           | Integer                                                                                                                                                |
     * | ai_agent.rating_remark                    | String                                                                                                                                                 |
     * | ai_agent.source_type                      | String                                                                                                                                                 |
     * | ai_agent.source_title                     | String                                                                                                                                                 |
     *
     * ### Accepted Operators
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
     * @return Pager<Conversation>
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
            getNextCursor: fn (ConversationList $response) => $response?->getPages()?->getNext()?->getStartingAfter() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ConversationList $response) => $response?->getConversations() ?? [],
        );
    }

    /**
     * You can reply to a conversation with a message from an admin or on behalf of a contact, or with a note for admins.
     *
     * @param ReplyToConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function reply(ReplyToConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/reply",
                    method: HttpMethod::POST,
                    body: $request->getBody(),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * For managing conversations you can:
     * - Close a conversation
     * - Snooze a conversation to reopen on a future date
     * - Open a conversation which is `snoozed` or `closed`
     * - Assign a conversation to an admin and/or team.
     *
     * @param ManageConversationPartsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function manage(ManageConversationPartsRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/parts",
                    method: HttpMethod::POST,
                    body: $request->getBody(),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.
     *
     * {% admonition type="warning" name="Contacts without an email" %}
     * If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
     * {% /admonition %}
     *
     *
     * @param AttachContactToConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function attachContactAsAdmin(AttachContactToConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/customers",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.
     *
     * {% admonition type="warning" name="Contacts without an email" %}
     * If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
     * {% /admonition %}
     *
     *
     * @param DetachContactFromConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function detachContactAsAdmin(DetachContactFromConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/customers/{$request->getContactId()}",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can redact a conversation part or the source message of a conversation (as seen in the source object).
     *
     * {% admonition type="info" name="Redacting parts and messages" %}
     * If you are redacting a conversation part, it must have a `body`. If you are redacting a source message, it must have been created by a contact. We will return a `conversation_part_not_redactable` error if these criteria are not met.
     * {% /admonition %}
     *
     *
     * @param RedactConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function redactConversationPart(RedactConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/redact",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can convert a conversation to a ticket.
     *
     * @param ConvertConversationToTicketRequest $request
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
    public function convertToTicket(ConvertConversationToTicketRequest $request, ?array $options = null): ?Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/convert",
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
     * {% admonition type="danger" name="Deprecation of Run Assignment Rules" %}
     * Run assignment rules is now deprecated in version 2.12 and future versions and will be permanently removed on December 31, 2026. After this date, any requests made to this endpoint will fail.
     * {% /admonition %}
     * You can let a conversation be automatically assigned following assignment rules.
     * {% admonition type="warning" name="When using workflows" %}
     * It is not possible to use this endpoint with Workflows.
     * {% /admonition %}
     *
     * @param AutoAssignConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function runAssignmentRules(AutoAssignConversationRequest $request, ?array $options = null): Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/{$request->getConversationId()}/run_assignment_rules",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Conversation::fromJson($json);
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
     * You can fetch a list of all conversations.
     *
     * You can optionally request the result page size and the cursor to start after to fetch the result.
     * {% admonition type="warning" name="Pagination" %}
     *   You can use pagination to limit the number of results returned. The default is `20` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ConversationList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _list(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): ConversationList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "conversations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ConversationList::fromJson($json);
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
     * You can search for multiple conversations by the value of their attributes in order to fetch exactly which ones you want.
     *
     * To search for conversations, you need to send a `POST` request to `https://api.intercom.io/conversations/search`.
     *
     * This will accept a query object in the body which will define your filters in order to search for conversations.
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `20` results per page and maximum is `150`.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiple's there can be:
     * - There's a limit of max 2 nested filters
     * - There's a limit of max 15 filters for each AND or OR group
     *
     * ### Accepted Fields
     *
     * Most keys listed in the conversation model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
     * The `source.body` field is unique as the search will not be performed against the entire value, but instead against every element of the value separately. For example, when searching for a conversation with a `"I need support"` body - the query should contain a `=` operator with the value `"support"` for such conversation to be returned. A query with a `=` operator and a `"need support"` value will not yield a result.
     *
     * | Field                                     | Type                                                                                                                                                   |
     * | :---------------------------------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------- |
     * | id                                        | String                                                                                                                                                 |
     * | created_at                                | Date (UNIX timestamp)                                                                                                                                  |
     * | updated_at                                | Date (UNIX timestamp)                                                                                                                                  |
     * | source.type                               | String<br>Accepted fields are `conversation`, `email`, `facebook`, `instagram`, `phone_call`, `phone_switch`, `push`, `sms`, `twitter` and `whatsapp`. |
     * | source.id                                 | String                                                                                                                                                 |
     * | source.delivered_as                       | String                                                                                                                                                 |
     * | source.subject                            | String                                                                                                                                                 |
     * | source.body                               | String                                                                                                                                                 |
     * | source.author.id                          | String                                                                                                                                                 |
     * | source.author.type                        | String                                                                                                                                                 |
     * | source.author.name                        | String                                                                                                                                                 |
     * | source.author.email                       | String                                                                                                                                                 |
     * | source.url                                | String                                                                                                                                                 |
     * | contact_ids                               | String                                                                                                                                                 |
     * | teammate_ids                              | String                                                                                                                                                 |
     * | admin_assignee_id                         | String                                                                                                                                                 |
     * | team_assignee_id                          | String                                                                                                                                                 |
     * | channel_initiated                         | String                                                                                                                                                 |
     * | open                                      | Boolean                                                                                                                                                |
     * | read                                      | Boolean                                                                                                                                                |
     * | state                                     | String                                                                                                                                                 |
     * | waiting_since                             | Date (UNIX timestamp)                                                                                                                                  |
     * | snoozed_until                             | Date (UNIX timestamp)                                                                                                                                  |
     * | tag_ids                                   | String                                                                                                                                                 |
     * | priority                                  | String                                                                                                                                                 |
     * | statistics.time_to_assignment             | Integer                                                                                                                                                |
     * | statistics.time_to_admin_reply            | Integer                                                                                                                                                |
     * | statistics.time_to_first_close            | Integer                                                                                                                                                |
     * | statistics.time_to_last_close             | Integer                                                                                                                                                |
     * | statistics.median_time_to_reply           | Integer                                                                                                                                                |
     * | statistics.first_contact_reply_at         | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_assignment_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_admin_reply_at           | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.first_close_at                 | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_assignment_at             | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_assignment_admin_reply_at | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_contact_reply_at          | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_admin_reply_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_close_at                  | Date (UNIX timestamp)                                                                                                                                  |
     * | statistics.last_closed_by_id              | String                                                                                                                                                 |
     * | statistics.count_reopens                  | Integer                                                                                                                                                |
     * | statistics.count_assignments              | Integer                                                                                                                                                |
     * | statistics.count_conversation_parts       | Integer                                                                                                                                                |
     * | conversation_rating.requested_at          | Date (UNIX timestamp)                                                                                                                                  |
     * | conversation_rating.replied_at            | Date (UNIX timestamp)                                                                                                                                  |
     * | conversation_rating.score                 | Integer                                                                                                                                                |
     * | conversation_rating.remark                | String                                                                                                                                                 |
     * | conversation_rating.contact_id            | String                                                                                                                                                 |
     * | conversation_rating.admin_d               | String                                                                                                                                                 |
     * | ai_agent_participated                     | Boolean                                                                                                                                                |
     * | ai_agent.resolution_state                 | String                                                                                                                                                 |
     * | ai_agent.last_answer_type                 | String                                                                                                                                                 |
     * | ai_agent.rating                           | Integer                                                                                                                                                |
     * | ai_agent.rating_remark                    | String                                                                                                                                                 |
     * | ai_agent.source_type                      | String                                                                                                                                                 |
     * | ai_agent.source_title                     | String                                                                                                                                                 |
     *
     * ### Accepted Operators
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
     * @return ConversationList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _search(SearchRequest $request, ?array $options = null): ConversationList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ConversationList::fromJson($json);
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
