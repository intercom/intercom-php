<?php

namespace Intercom\Unstable\DataAttributes;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\DataAttributes\Requests\LisDataAttributesRequest;
use Intercom\Unstable\Types\DataAttributeList;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\DataAttributes\Types\DataAttribute;
use Intercom\Unstable\DataAttributes\Requests\UpdateDataAttributeBody;

class DataAttributesClient
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
     * You can fetch a list of all data attributes belonging to a workspace for contacts, companies or conversations.
     *
     * Example:
     * ```php
     * $client->dataAttributes->list(
     *     new ListDataAttributesRequest([
     *         'model' => DataAttributesListRequestModel::Contact->value,
     *         'includeArchived' => true,
     *     ]),
     * );
     * ```
     *
     * @param LisDataAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DataAttributeList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function lisDataAttributes(LisDataAttributesRequest $request = new LisDataAttributesRequest(), ?array $options = null): ?DataAttributeList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getModel() != null) {
            $query['model'] = $request->getModel();
        }
        if ($request->getIncludeArchived() != null) {
            $query['include_archived'] = $request->getIncludeArchived();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "data_attributes",
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
                return DataAttributeList::fromJson($json);
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
     * You can create a data attributes for a `contact` or a `company`.
     *
     * Example:
     * ```php
     * $client->unstable->dataAttributes->createDataAttribute(
     *     [
     *         'key' => "value",
     *     ],
     * );
     * ```
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
     * @return ?DataAttribute
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createDataAttribute(mixed $request, ?array $options = null): ?DataAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "data_attributes",
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
                return DataAttribute::fromJson($json);
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
     * You can update a data attribute.
     *
     * > 🚧 Updating the data type is not possible
     * >
     * > It is currently a dangerous action to execute changing a data attribute's type via the API. You will need to update the type via the UI instead.
     *
     * Example:
     * ```php
     * $client->unstable->dataAttributes->updateDataAttribute(
     *     new UpdateDataAttributeBody([
     *         'id' => 1,
     *         'body' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param UpdateDataAttributeBody $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DataAttribute
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateDataAttribute(UpdateDataAttributeBody $request, ?array $options = null): ?DataAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "data_attributes/" . RawClient::encodePathParam($request->getId()),
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
                return DataAttribute::fromJson($json);
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
