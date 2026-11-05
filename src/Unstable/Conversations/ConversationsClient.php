<?php

namespace Intercom\Unstable\Conversations;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\Conversations\Requests\ListConversationsRequest;
use Intercom\Unstable\Types\ConversationList;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\Conversations\Requests\CreateConversationRequest;
use Intercom\Unstable\Messages\Types\Message;
use Intercom\Unstable\Conversations\Requests\RetrieveConversationRequest;
use Intercom\Unstable\Conversations\Types\Conversation;
use Intercom\Unstable\Conversations\Requests\UpdateConversationRequest;
use Intercom\Unstable\Conversations\Requests\DeleteConversationRequest;
use Intercom\Unstable\Types\ConversationDeleted;
use Intercom\Unstable\Types\SearchRequest;
use Intercom\Unstable\Conversations\Requests\ReplyConversationBody;
use Intercom\Unstable\Conversations\Requests\ManageConversationRequest;
use Intercom\Unstable\Conversations\Requests\AttachContactToConversationRequest;
use Intercom\Unstable\Conversations\Requests\DetachContactFromConversationRequest;
use Intercom\Unstable\Conversations\Requests\ListHandlingEventsRequest;
use Intercom\Unstable\Types\HandlingEventList;
use Intercom\Unstable\Types\RedactConversationRequest;
use Intercom\Unstable\Conversations\Requests\ConvertConversationToTicketRequest;
use Intercom\Unstable\Tickets\Types\Ticket;

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
     * Example:
     * ```php
     * $client->conversations->list(
     *     new ListConversationsRequest([
     *         'perPage' => 1,
     *         'startingAfter' => 'starting_after',
     *     ]),
     * );
     * ```
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
     * @return ?ConversationList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listConversations(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): ?ConversationList
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
                if (empty($json)) {
                    return null;
                }
                return ConversationList::fromJson($json);
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
     * Example:
     * ```php
     * $client->conversations->create(
     *     new CreateConversationRequest([
     *         'from' => new CreateConversationRequestFrom([
     *             'type' => CreateConversationRequestFromType::User->value,
     *             'id' => '6762f11b1bb69f9f2193bba3',
     *         ]),
     *         'body' => 'Hello there',
     *     ]),
     * );
     * ```
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
     * @return ?Message
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createConversation(CreateConversationRequest $request, ?array $options = null): ?Message
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
     * Example:
     * ```php
     * $client->unstable->conversations->retrieveConversation(
     *     new RetrieveConversationRequest([
     *         'id' => 1,
     *         'displayAs' => 'plaintext',
     *         'includeTranslations' => true,
     *     ]),
     * );
     * ```
     *
     * @param RetrieveConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function retrieveConversation(RetrieveConversationRequest $request, ?array $options = null): ?Conversation
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
                    path: "conversations/" . RawClient::encodePathParam($request->getId()),
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
                return Conversation::fromJson($json);
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
     * Example:
     * ```php
     * $client->unstable->conversations->updateConversation(
     *     new UpdateConversationRequest([
     *         'id' => 1,
     *         'displayAs' => 'plaintext',
     *         'read' => true,
     *         'title' => 'new conversation title',
     *         'customAttributes' => [
     *             'issue_type' => 'Billing',
     *             'priority' => 'High',
     *         ],
     *     ]),
     * );
     * ```
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
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateConversation(UpdateConversationRequest $request, ?array $options = null): ?Conversation
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
                    path: "conversations/" . RawClient::encodePathParam($request->getId()),
                    method: HttpMethod::PUT,
                    query: $query,
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
                return Conversation::fromJson($json);
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
     * You can delete a single conversation.
     *
     * Example:
     * ```php
     * $client->unstable->conversations->deleteConversation(
     *     new DeleteConversationRequest([
     *         'id' => 1,
     *     ]),
     * );
     * ```
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
     * @return ?ConversationDeleted
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteConversation(DeleteConversationRequest $request, ?array $options = null): ?ConversationDeleted
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()),
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
                return ConversationDeleted::fromJson($json);
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
     * Example:
     * ```php
     * $client->unstable->conversations->searchConversations(
     *     new SearchRequest([
     *         'query' => new SingleFilterSearchRequest([
     *             'value' => [],
     *         ]),
     *         'pagination' => new StartingAfterPaging([
     *             'perPage' => 5,
     *         ]),
     *     ]),
     * );
     * ```
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
     * @return ?ConversationList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function searchConversations(SearchRequest $request, ?array $options = null): ?ConversationList
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
                if (empty($json)) {
                    return null;
                }
                return ConversationList::fromJson($json);
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
     * You can reply to a conversation with a message from an admin or on behalf of a contact, or with a note for admins.
     *
     * Example:
     * ```php
     * $client->unstable->conversations->replyConversation(
     *     new ReplyConversationBody([
     *         'id' => '123 or "last"',
     *         'body' => new ContactReplyIntercomUserIdRequest([
     *             'messageType' => 'comment',
     *             'type' => 'user',
     *             'body' => 'Thanks again :)',
     *             'intercomUserId' => '6762f1571bb69f9f2193bbbb',
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param ReplyConversationBody $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function replyConversation(ReplyConversationBody $request, ?array $options = null): ?Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()) . "/reply",
                    method: HttpMethod::POST,
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
                return Conversation::fromJson($json);
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
     * For managing conversations you can:
     * - Close a conversation
     * - Snooze a conversation to reopen on a future date
     * - Open a conversation which is `snoozed` or `closed`
     * - Assign a conversation to an admin and/or team.
     *
     * Example:
     * ```php
     * $client->unstable->conversations->manageConversation(
     *     new ManageConversationRequest([
     *         'id' => '123',
     *         'body' => ManageConversationRequestBody::close(new CloseConversationRequest([
     *             'type' => 'admin',
     *             'adminId' => '12345',
     *         ])),
     *     ]),
     * );
     * ```
     *
     * @param ManageConversationRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function manageConversation(ManageConversationRequest $request, ?array $options = null): ?Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()) . "/parts",
                    method: HttpMethod::POST,
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
                return Conversation::fromJson($json);
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
     * You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.
     *
     * {% admonition type="warning" name="Contacts without an email" %}
     * If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
     * {% /admonition %}
     *
     *
     * Example:
     * ```php
     * $client->unstable->conversations->attachContactToConversation(
     *     new AttachContactToConversationRequest([
     *         'id' => '123',
     *         'adminId' => '12345',
     *         'customer' => new AttachContactToConversationRequestCustomerIntercomUserId([
     *             'intercomUserId' => '6762f19b1bb69f9f2193bbd4',
     *         ]),
     *     ]),
     * );
     * ```
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
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function attachContactToConversation(AttachContactToConversationRequest $request, ?array $options = null): ?Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()) . "/customers",
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
                return Conversation::fromJson($json);
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
     * You can add participants who are contacts to a conversation, on behalf of either another contact or an admin.
     *
     * {% admonition type="warning" name="Contacts without an email" %}
     * If you add a contact via the email parameter and there is no user/lead found on that workspace with he given email, then we will create a new contact with `role` set to `lead`.
     * {% /admonition %}
     *
     *
     * Example:
     * ```php
     * $client->conversations->detachContactAsAdmin(
     *     new DetachContactFromConversationRequest([
     *         'conversationId' => '123',
     *         'contactId' => '123',
     *         'adminId' => '5017690',
     *     ]),
     * );
     * ```
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
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function detachContactFromConversation(DetachContactFromConversationRequest $request, ?array $options = null): ?Conversation
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getConversationId()) . "/customers/" . RawClient::encodePathParam($request->getContactId()),
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
                return Conversation::fromJson($json);
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
     * List all pause/resume events for a conversation. These events track when teammates paused or resumed handling a conversation.
     *
     * Requires the `read_conversations` OAuth scope.
     *
     * Example:
     * ```php
     * $client->unstable->conversations->listHandlingEvents(
     *     new ListHandlingEventsRequest([
     *         'id' => '123',
     *     ]),
     * );
     * ```
     *
     * @param ListHandlingEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?HandlingEventList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listHandlingEvents(ListHandlingEventsRequest $request, ?array $options = null): ?HandlingEventList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()) . "/handling_events",
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
                return HandlingEventList::fromJson($json);
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
     * You can redact a conversation part or the source message of a conversation (as seen in the source object).
     *
     * {% admonition type="info" name="Redacting parts and messages" %}
     * If you are redacting a conversation part, it must have a `body`. If you are redacting a source message, it must have been created by a contact. We will return a `conversation_part_not_redactable` error if these criteria are not met.
     * {% /admonition %}
     *
     *
     * Example:
     * ```php
     * $client->conversations->redactConversationPart(
     *     RedactConversationRequest::conversationPart(new RedactConversationRequestConversationPart([
     *         'conversationId' => '19894788788',
     *         'conversationPartId' => '19381789428',
     *     ])),
     * );
     * ```
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
     * @return ?Conversation
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function redactConversation(RedactConversationRequest $request, ?array $options = null): ?Conversation
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
                if (empty($json)) {
                    return null;
                }
                return Conversation::fromJson($json);
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
     * You can convert a conversation to a ticket.
     *
     * Example:
     * ```php
     * $client->unstable->conversations->convertConversationToTicket(
     *     new ConvertConversationToTicketRequest([
     *         'id' => 1,
     *         'ticketTypeId' => '53',
     *     ]),
     * );
     * ```
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
    public function convertConversationToTicket(ConvertConversationToTicketRequest $request, ?array $options = null): ?Ticket
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "conversations/" . RawClient::encodePathParam($request->getId()) . "/convert",
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
