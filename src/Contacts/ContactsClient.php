<?php

namespace Intercom\Contacts;

use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Contacts\Requests\ListAttachedCompaniesRequest;
use Intercom\Core\Pagination\Pager;
use Intercom\Companies\Types\Company;
use Intercom\Core\Pagination\OffsetPager;
use Intercom\Types\ContactAttachedCompanies;
use Intercom\Contacts\Requests\ListSegmentsAttachedToContactRequest;
use Intercom\Types\ContactSegments;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Contacts\Requests\ListAttachedSubscriptionsRequest;
use Intercom\Types\SubscriptionTypeList;
use Intercom\Contacts\Requests\AttachSubscriptionToContactRequest;
use Intercom\SubscriptionTypes\Types\SubscriptionType;
use Intercom\Contacts\Requests\DetachSubscriptionFromContactRequest;
use Intercom\Contacts\Requests\ListTagsAttachedToContactRequest;
use Intercom\Types\TagList;
use Intercom\Contacts\Requests\FindContactRequest;
use Intercom\Contacts\Types\Contact;
use Intercom\Contacts\Requests\UpdateContactRequest;
use Intercom\Contacts\Requests\DeleteContactRequest;
use Intercom\Types\ContactDeleted;
use Intercom\Contacts\Requests\MergeContactsRequest;
use Intercom\Types\SearchRequest;
use Intercom\Core\Pagination\CursorPager;
use Intercom\Core\Pagination\PaginationHelper;
use Intercom\Types\ContactList;
use Intercom\Contacts\Requests\ListContactsRequest;
use Intercom\Types\CreateContactRequestWithEmail;
use Intercom\Types\CreateContactRequestWithExternalId;
use Intercom\Types\CreateContactRequestWithRole;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use Intercom\Contacts\Requests\ArchiveContactRequest;
use Intercom\Types\ContactArchived;
use Intercom\Contacts\Requests\UnarchiveContactRequest;
use Intercom\Types\ContactUnarchived;

class ContactsClient
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
     * You can fetch a list of companies that are associated to a contact.
     *
     * @param ListAttachedCompaniesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Company>
     */
    public function listAttachedCompanies(ListAttachedCompaniesRequest $request, ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListAttachedCompaniesRequest $request) => $this->_listAttachedCompanies($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListAttachedCompaniesRequest $request) => $request?->getPage() ?? 0,
            setOffset: function (ListAttachedCompaniesRequest $request, int $offset) {
                $request->setPage($offset);
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ContactAttachedCompanies $response) => $response?->getCompanies() ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * You can fetch a list of segments that are associated to a contact.
     *
     * @param ListSegmentsAttachedToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactSegments
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAttachedSegments(ListSegmentsAttachedToContactRequest $request, ?array $options = null): ContactSegments
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/segments",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactSegments::fromJson($json);
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
     * You can fetch a list of subscription types that are attached to a contact. These can be subscriptions that a user has 'opted-in' to or has 'opted-out' from, depending on the subscription type.
     * This will return a list of Subscription Type objects that the contact is associated with.
     *
     * The data property will show a combined list of:
     *
     *   1.Opt-out subscription types that the user has opted-out from.
     *   2.Opt-in subscription types that the user has opted-in to receiving.
     *
     * @param ListAttachedSubscriptionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SubscriptionTypeList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAttachedSubscriptions(ListAttachedSubscriptionsRequest $request, ?array $options = null): SubscriptionTypeList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/subscriptions",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SubscriptionTypeList::fromJson($json);
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
     * You can add a specific subscription to a contact. In Intercom, we have two different subscription types based on user consent - opt-out and opt-in:
     *
     *   1.Attaching a contact to an opt-out subscription type will opt that user out from receiving messages related to that subscription type.
     *
     *   2.Attaching a contact to an opt-in subscription type will opt that user in to receiving messages related to that subscription type.
     *
     * This will return a subscription type model for the subscription type that was added to the contact.
     *
     * @param AttachSubscriptionToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SubscriptionType
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function attachSubscription(AttachSubscriptionToContactRequest $request, ?array $options = null): SubscriptionType
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/subscriptions",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SubscriptionType::fromJson($json);
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
     * You can remove a specific subscription from a contact. This will return a subscription type model for the subscription type that was removed from the contact.
     *
     * @param DetachSubscriptionFromContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SubscriptionType
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function detachSubscription(DetachSubscriptionFromContactRequest $request, ?array $options = null): SubscriptionType
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/subscriptions/{$request->getSubscriptionId()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SubscriptionType::fromJson($json);
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
     * You can fetch a list of all tags that are attached to a specific contact.
     *
     * @param ListTagsAttachedToContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return TagList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAttachedTags(ListTagsAttachedToContactRequest $request, ?array $options = null): TagList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/tags",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return TagList::fromJson($json);
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
     * You can fetch the details of a single contact.
     *
     * @param FindContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Contact
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function find(FindContactRequest $request, ?array $options = null): Contact
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Contact::fromJson($json);
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
     * You can update an existing contact (ie. user or lead).
     *
     * @param UpdateContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Contact
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function update(UpdateContactRequest $request, ?array $options = null): Contact
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Contact::fromJson($json);
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
     * You can delete a single contact.
     *
     * @param DeleteContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactDeleted
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function delete(DeleteContactRequest $request, ?array $options = null): ContactDeleted
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactDeleted::fromJson($json);
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
     * You can merge a contact with a `role` of `lead` into a contact with a `role` of `user`.
     *
     * @param MergeContactsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Contact
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function mergeLeadInUser(MergeContactsRequest $request, ?array $options = null): Contact
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/merge",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Contact::fromJson($json);
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
     * You can search for multiple contacts by the value of their attributes in order to fetch exactly who you want.
     *
     * To search for contacts, you need to send a `POST` request to `https://api.intercom.io/contacts/search`.
     *
     * This will accept a query object in the body which will define your filters in order to search for contacts.
     *
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `50` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     * ### Contact Creation Delay
     *
     * If a contact has recently been created, there is a possibility that it will not yet be available when searching. This means that it may not appear in the response. This delay can take a few minutes. If you need to be instantly notified it is recommended to use webhooks and iterate to see if they match your search filters.
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiple's there can be:
     * * There's a limit of max 2 nested filters
     * * There's a limit of max 15 filters for each AND or OR group
     *
     * ### Searching for Timestamp Fields
     *
     * All timestamp fields (created_at, updated_at etc.) are indexed as Dates for Contact Search queries; Datetime queries are not currently supported. This means you can only query for timestamp fields by day - not hour, minute or second.
     * For example, if you search for all Contacts with a created_at value greater (>) than 1577869200 (the UNIX timestamp for January 1st, 2020 9:00 AM), that will be interpreted as 1577836800 (January 1st, 2020 12:00 AM). The search results will then include Contacts created from January 2nd, 2020 12:00 AM onwards.
     * If you'd like to get contacts created on January 1st, 2020 you should search with a created_at value equal (=) to 1577836800 (January 1st, 2020 12:00 AM).
     * This behaviour applies only to timestamps used in search queries. The search results will still contain the full UNIX timestamp and be sorted accordingly.
     *
     * ### Accepted Fields
     *
     * Most key listed as part of the Contacts Model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
     *
     * | Field                              | Type                           |
     * | ---------------------------------- | ------------------------------ |
     * | id                                 | String                         |
     * | role                               | String<br>Accepts user or lead |
     * | name                               | String                         |
     * | avatar                             | String                         |
     * | owner_id                           | Integer                        |
     * | email                              | String                         |
     * | email_domain                       | String                         |
     * | phone                              | String                         |
     * | external_id                        | String                         |
     * | created_at                         | Date (UNIX Timestamp)          |
     * | signed_up_at                       | Date (UNIX Timestamp)          |
     * | updated_at                         | Date (UNIX Timestamp)          |
     * | last_seen_at                       | Date (UNIX Timestamp)          |
     * | last_contacted_at                  | Date (UNIX Timestamp)          |
     * | last_replied_at                    | Date (UNIX Timestamp)          |
     * | last_email_opened_at               | Date (UNIX Timestamp)          |
     * | last_email_clicked_at              | Date (UNIX Timestamp)          |
     * | language_override                  | String                         |
     * | browser                            | String                         |
     * | browser_language                   | String                         |
     * | os                                 | String                         |
     * | location.country                   | String                         |
     * | location.region                    | String                         |
     * | location.city                      | String                         |
     * | unsubscribed_from_emails           | Boolean                        |
     * | marked_email_as_spam               | Boolean                        |
     * | has_hard_bounced                   | Boolean                        |
     * | ios_last_seen_at                   | Date (UNIX Timestamp)          |
     * | ios_app_version                    | String                         |
     * | ios_device                         | String                         |
     * | ios_app_device                     | String                         |
     * | ios_os_version                     | String                         |
     * | ios_app_name                       | String                         |
     * | ios_sdk_version                    | String                         |
     * | android_last_seen_at               | Date (UNIX Timestamp)          |
     * | android_app_version                | String                         |
     * | android_device                     | String                         |
     * | android_app_name                   | String                         |
     * | andoid_sdk_version                 | String                         |
     * | segment_id                         | String                         |
     * | tag_id                             | String                         |
     * | custom_attributes.{attribute_name} | String                         |
     *
     * ### Accepted Operators
     *
     * {% admonition type="warning" name="Searching based on `created_at`" %}
     *   You cannot use the `<=` or `>=` operators to search by `created_at`.
     * {% /admonition %}
     *
     * The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).
     *
     * | Operator | Valid Types                      | Description                                                      |
     * | :------- | :------------------------------- | :--------------------------------------------------------------- |
     * | =        | All                              | Equals                                                           |
     * | !=       | All                              | Doesn't Equal                                                    |
     * | IN       | All                              | In<br>Shortcut for `OR` queries<br>Values must be in Array       |
     * | NIN      | All                              | Not In<br>Shortcut for `OR !` queries<br>Values must be in Array |
     * | >        | Integer<br>Date (UNIX Timestamp) | Greater than                                                     |
     * | <       | Integer<br>Date (UNIX Timestamp) | Lower than                                                       |
     * | ~        | String                           | Contains                                                         |
     * | !~       | String                           | Doesn't Contain                                                  |
     * | ^        | String                           | Starts With                                                      |
     * | $        | String                           | Ends With                                                        |
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
     * @return Pager<Contact>
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
            getNextCursor: fn (ContactList $response) => $response?->getPages()?->getNext()?->getStartingAfter() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ContactList $response) => $response?->getData() ?? [],
        );
    }

    /**
     * You can fetch a list of all contacts (ie. users or leads) in your workspace.
     * {% admonition type="warning" name="Pagination" %}
     *   You can use pagination to limit the number of results returned. The default is `50` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * @param ListContactsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Contact>
     */
    public function list(ListContactsRequest $request = new ListContactsRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListContactsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListContactsRequest $request, ?string $cursor) {
                $request->setStartingAfter($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ContactList $response) => $response?->getPages()?->getNext()?->getStartingAfter() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ContactList $response) => $response?->getData() ?? [],
        );
    }

    /**
     * You can create a new contact (ie. user or lead).
     *
     * @param (
     *    CreateContactRequestWithEmail
     *   |CreateContactRequestWithExternalId
     *   |CreateContactRequestWithRole
     * ) $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Contact
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function create(CreateContactRequestWithEmail|CreateContactRequestWithExternalId|CreateContactRequestWithRole $request, ?array $options = null): Contact
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts",
                    method: HttpMethod::POST,
                    body: JsonSerializer::serializeUnion($request, new Union(CreateContactRequestWithEmail::class, CreateContactRequestWithExternalId::class, CreateContactRequestWithRole::class)),
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return Contact::fromJson($json);
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
     * You can archive a single contact.
     *
     * @param ArchiveContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactArchived
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function archive(ArchiveContactRequest $request, ?array $options = null): ContactArchived
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/archive",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactArchived::fromJson($json);
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
     * You can unarchive a single contact.
     *
     * @param UnarchiveContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactUnarchived
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function unarchive(UnarchiveContactRequest $request, ?array $options = null): ContactUnarchived
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/{$request->getContactId()}/unarchive",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactUnarchived::fromJson($json);
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
     * You can fetch a list of companies that are associated to a contact.
     *
     * @param ListAttachedCompaniesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactAttachedCompanies
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _listAttachedCompanies(ListAttachedCompaniesRequest $request, ?array $options = null): ContactAttachedCompanies
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
                    path: "contacts/{$request->getContactId()}/companies",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactAttachedCompanies::fromJson($json);
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
     * You can search for multiple contacts by the value of their attributes in order to fetch exactly who you want.
     *
     * To search for contacts, you need to send a `POST` request to `https://api.intercom.io/contacts/search`.
     *
     * This will accept a query object in the body which will define your filters in order to search for contacts.
     *
     * {% admonition type="warning" name="Optimizing search queries" %}
     *   Search queries can be complex, so optimizing them can help the performance of your search.
     *   Use the `AND` and `OR` operators to combine multiple filters to get the exact results you need and utilize
     *   pagination to limit the number of results returned. The default is `50` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#example-search-conversations-request) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     * ### Contact Creation Delay
     *
     * If a contact has recently been created, there is a possibility that it will not yet be available when searching. This means that it may not appear in the response. This delay can take a few minutes. If you need to be instantly notified it is recommended to use webhooks and iterate to see if they match your search filters.
     *
     * ### Nesting & Limitations
     *
     * You can nest these filters in order to get even more granular insights that pinpoint exactly what you need. Example: (1 OR 2) AND (3 OR 4).
     * There are some limitations to the amount of multiple's there can be:
     * * There's a limit of max 2 nested filters
     * * There's a limit of max 15 filters for each AND or OR group
     *
     * ### Searching for Timestamp Fields
     *
     * All timestamp fields (created_at, updated_at etc.) are indexed as Dates for Contact Search queries; Datetime queries are not currently supported. This means you can only query for timestamp fields by day - not hour, minute or second.
     * For example, if you search for all Contacts with a created_at value greater (>) than 1577869200 (the UNIX timestamp for January 1st, 2020 9:00 AM), that will be interpreted as 1577836800 (January 1st, 2020 12:00 AM). The search results will then include Contacts created from January 2nd, 2020 12:00 AM onwards.
     * If you'd like to get contacts created on January 1st, 2020 you should search with a created_at value equal (=) to 1577836800 (January 1st, 2020 12:00 AM).
     * This behaviour applies only to timestamps used in search queries. The search results will still contain the full UNIX timestamp and be sorted accordingly.
     *
     * ### Accepted Fields
     *
     * Most key listed as part of the Contacts Model are searchable, whether writeable or not. The value you search for has to match the accepted type, otherwise the query will fail (ie. as `created_at` accepts a date, the `value` cannot be a string such as `"foorbar"`).
     *
     * | Field                              | Type                           |
     * | ---------------------------------- | ------------------------------ |
     * | id                                 | String                         |
     * | role                               | String<br>Accepts user or lead |
     * | name                               | String                         |
     * | avatar                             | String                         |
     * | owner_id                           | Integer                        |
     * | email                              | String                         |
     * | email_domain                       | String                         |
     * | phone                              | String                         |
     * | external_id                        | String                         |
     * | created_at                         | Date (UNIX Timestamp)          |
     * | signed_up_at                       | Date (UNIX Timestamp)          |
     * | updated_at                         | Date (UNIX Timestamp)          |
     * | last_seen_at                       | Date (UNIX Timestamp)          |
     * | last_contacted_at                  | Date (UNIX Timestamp)          |
     * | last_replied_at                    | Date (UNIX Timestamp)          |
     * | last_email_opened_at               | Date (UNIX Timestamp)          |
     * | last_email_clicked_at              | Date (UNIX Timestamp)          |
     * | language_override                  | String                         |
     * | browser                            | String                         |
     * | browser_language                   | String                         |
     * | os                                 | String                         |
     * | location.country                   | String                         |
     * | location.region                    | String                         |
     * | location.city                      | String                         |
     * | unsubscribed_from_emails           | Boolean                        |
     * | marked_email_as_spam               | Boolean                        |
     * | has_hard_bounced                   | Boolean                        |
     * | ios_last_seen_at                   | Date (UNIX Timestamp)          |
     * | ios_app_version                    | String                         |
     * | ios_device                         | String                         |
     * | ios_app_device                     | String                         |
     * | ios_os_version                     | String                         |
     * | ios_app_name                       | String                         |
     * | ios_sdk_version                    | String                         |
     * | android_last_seen_at               | Date (UNIX Timestamp)          |
     * | android_app_version                | String                         |
     * | android_device                     | String                         |
     * | android_app_name                   | String                         |
     * | andoid_sdk_version                 | String                         |
     * | segment_id                         | String                         |
     * | tag_id                             | String                         |
     * | custom_attributes.{attribute_name} | String                         |
     *
     * ### Accepted Operators
     *
     * {% admonition type="warning" name="Searching based on `created_at`" %}
     *   You cannot use the `<=` or `>=` operators to search by `created_at`.
     * {% /admonition %}
     *
     * The table below shows the operators you can use to define how you want to search for the value.  The operator should be put in as a string (`"="`). The operator has to be compatible with the field's type (eg. you cannot search with `>` for a given string value as it's only compatible for integer's and dates).
     *
     * | Operator | Valid Types                      | Description                                                      |
     * | :------- | :------------------------------- | :--------------------------------------------------------------- |
     * | =        | All                              | Equals                                                           |
     * | !=       | All                              | Doesn't Equal                                                    |
     * | IN       | All                              | In<br>Shortcut for `OR` queries<br>Values must be in Array       |
     * | NIN      | All                              | Not In<br>Shortcut for `OR !` queries<br>Values must be in Array |
     * | >        | Integer<br>Date (UNIX Timestamp) | Greater than                                                     |
     * | <       | Integer<br>Date (UNIX Timestamp) | Lower than                                                       |
     * | ~        | String                           | Contains                                                         |
     * | !~       | String                           | Doesn't Contain                                                  |
     * | ^        | String                           | Starts With                                                      |
     * | $        | String                           | Ends With                                                        |
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
     * @return ContactList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _search(SearchRequest $request, ?array $options = null): ContactList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactList::fromJson($json);
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
     * You can fetch a list of all contacts (ie. users or leads) in your workspace.
     * {% admonition type="warning" name="Pagination" %}
     *   You can use pagination to limit the number of results returned. The default is `50` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * @param ListContactsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ContactList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    private function _list(ListContactsRequest $request = new ListContactsRequest(), ?array $options = null): ContactList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getPage() != null) {
            $query['page'] = $request->getPage();
        }
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
                    path: "contacts",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ContactList::fromJson($json);
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
