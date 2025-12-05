<?php

namespace Intercom\Unstable\DataEvents;

use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\DataEvents\Requests\LisDataEventsRequest;
use Intercom\Unstable\Types\DataEventSummary;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterUserId;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterIntercomUserId;
use Intercom\Unstable\DataEvents\Types\LisDataEventsRequestFilterEmail;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\DataEvents\Requests\CreateDataEventSummariesRequest;

class DataEventsClient
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
     *
     * > 🚧
     * >
     * > Please note that you can only 'list' events that are less than 90 days old. Event counts and summaries will still include your events older than 90 days but you cannot 'list' these events individually if they are older than 90 days
     *
     * The events belonging to a customer can be listed by sending a GET request to `https://api.intercom.io/events` with a user or lead identifier along with a `type` parameter. The identifier parameter can be one of `user_id`, `email` or `intercom_user_id`. The `type` parameter value must be `user`.
     *
     * - `https://api.intercom.io/events?type=user&user_id={user_id}`
     * - `https://api.intercom.io/events?type=user&email={email}`
     * - `https://api.intercom.io/events?type=user&intercom_user_id={id}` (this call can be used to list leads)
     *
     * The `email` parameter value should be [url encoded](http://en.wikipedia.org/wiki/Percent-encoding) when sending.
     *
     * You can optionally define the result page size as well with the `per_page` parameter.
     *
     * @param LisDataEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DataEventSummary
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function lisDataEvents(LisDataEventsRequest $request, ?array $options = null): DataEventSummary
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['filter'] = JsonSerializer::serializeUnion($request->getFilter(), new Union(LisDataEventsRequestFilterUserId::class, LisDataEventsRequestFilterIntercomUserId::class, LisDataEventsRequestFilterEmail::class));
        $query['type'] = $request->getType();
        if ($request->getSummary() != null) {
            $query['summary'] = $request->getSummary();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "events",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DataEventSummary::fromJson($json);
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
     * You will need an Access Token that has write permissions to send Events. Once you have a key you can submit events via POST to the Events resource, which is located at https://api.intercom.io/events, or you can send events using one of the client libraries. When working with the HTTP API directly a client should send the event with a `Content-Type` of `application/json`.
     *
     * When using the JavaScript API, [adding the code to your app](http://docs.intercom.io/configuring-Intercom/tracking-user-events-in-your-app) makes the Events API available. Once added, you can submit an event using the `trackEvent` method. This will associate the event with the Lead or currently logged-in user or logged-out visitor/lead and send it to Intercom. The final parameter is a map that can be used to send optional metadata about the event.
     *
     * With the Ruby client you pass a hash describing the event to `Intercom::Event.create`, or call the `track_user` method directly on the current user object (e.g. `user.track_event`).
     *
     * **NB: For the JSON object types, please note that we do not currently support nested JSON structure.**
     *
     * | Type            | Description                                                                                                                                                                                                     | Example                                                                           |
     * | :-------------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :-------------------------------------------------------------------------------- |
     * | String          | The value is a JSON String                                                                                                                                                                                      | `"source":"desktop"`                                                              |
     * | Number          | The value is a JSON Number                                                                                                                                                                                      | `"load": 3.67`                                                                    |
     * | Date            | The key ends with the String `_date` and the value is a [Unix timestamp](http://en.wikipedia.org/wiki/Unix_time), assumed to be in the [UTC](http://en.wikipedia.org/wiki/Coordinated_Universal_Time) timezone. | `"contact_date": 1392036272`                                                      |
     * | Link            | The value is a HTTP or HTTPS URI.                                                                                                                                                                               | `"article": "https://example.org/ab1de.html"`                                     |
     * | Rich Link       | The value is a JSON object that contains `url` and `value` keys.                                                                                                                                                | `"article": {"url": "https://example.org/ab1de.html", "value":"the dude abides"}` |
     * | Monetary Amount | The value is a JSON object that contains `amount` and `currency` keys. The `amount` key is a positive integer representing the amount in cents. The price in the example to the right denotes €349.99.          | `"price": {"amount": 34999, "currency": "eur"}`                                   |
     *
     * **Lead Events**
     *
     * When submitting events for Leads, you will need to specify the Lead's `id`.
     *
     * **Metadata behaviour**
     *
     * - We currently limit the number of tracked metadata keys to 10 per event. Once the quota is reached, we ignore any further keys we receive. The first 10 metadata keys are determined by the order in which they are sent in with the event.
     * - It is not possible to change the metadata keys once the event has been sent. A new event will need to be created with the new keys and you can archive the old one.
     * - There might be up to 24 hrs delay when you send a new metadata for an existing event.
     *
     * **Event de-duplication**
     *
     * The API may detect and ignore duplicate events. Each event is uniquely identified as a combination of the following data - the Workspace identifier, the Contact external identifier, the Data Event name and the Data Event created time. As a result, it is **strongly recommended** to send a second granularity Unix timestamp in the `created_at` field.
     *
     * Duplicated events are responded to using the normal `202 Accepted` code - an error is not thrown, however repeat requests will be counted against any rate limit that is in place.
     *
     * ### HTTP API Responses
     *
     * - Successful responses to submitted events return `202 Accepted` with an empty body.
     * - Unauthorised access will be rejected with a `401 Unauthorized` or `403 Forbidden` response code.
     * - Events sent about users that cannot be found will return a `404 Not Found`.
     * - Event lists containing duplicate events will have those duplicates ignored.
     * - Server errors will return a `500` response code and may contain an error message in the body.
     *
     *
     * @param mixed $request
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
    public function createDataEvent(mixed $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "events",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Create event summaries for a user. Event summaries are used to track the number of times an event has occurred, the first time it occurred and the last time it occurred.
     *
     *
     * @param CreateDataEventSummariesRequest $request
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
    public function dataEventSummaries(CreateDataEventSummariesRequest $request = new CreateDataEventSummariesRequest(), ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "events/summaries",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
