<?php

namespace Intercom\DataAttributes;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\DataAttributes\Requests\ListDataAttributesRequest;
use Intercom\Types\DataAttributeList;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Types\CreateDataAttributeRequestOptions;
use Intercom\Types\CreateDataAttributeRequestOne;
use Intercom\DataAttributes\Types\DataAttribute;
use Intercom\Core\Json\JsonSerializer;
use Intercom\Core\Types\Union;
use Intercom\DataAttributes\Requests\UpdateDataAttributeRequest;

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
     * @param ListDataAttributesRequest $request
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
    public function list(ListDataAttributesRequest $request = new ListDataAttributesRequest(), ?array $options = null): ?DataAttributeList
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
     * $client->dataAttributes->create(
     *     new CreateDataAttributeRequestOptions([
     *         'dataType' => 'string',
     *         'options' => [
     *             new CreateDataAttributeRequestOptionsOptionsItem([]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param (
     *    CreateDataAttributeRequestOptions
     *   |CreateDataAttributeRequestOne
     * ) $request
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
    public function create(CreateDataAttributeRequestOptions|CreateDataAttributeRequestOne $request, ?array $options = null): ?DataAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "data_attributes",
                    method: HttpMethod::POST,
                    body: JsonSerializer::serializeUnion($request, new Union(CreateDataAttributeRequestOptions::class, CreateDataAttributeRequestOne::class)),
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
     * $client->dataAttributes->update(
     *     new UpdateDataAttributeRequest([
     *         'dataAttributeId' => 1,
     *         'body' => new UpdateDataAttributeRequestBodyOptions([
     *             'options' => [
     *                 new UpdateDataAttributeRequestBodyOptionsOptionsItem([
     *                     'value' => '1-10',
     *                 ]),
     *                 new UpdateDataAttributeRequestBodyOptionsOptionsItem([
     *                     'value' => '11-20',
     *                 ]),
     *             ],
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param UpdateDataAttributeRequest $request
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
    public function update(UpdateDataAttributeRequest $request, ?array $options = null): ?DataAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "data_attributes/" . RawClient::encodePathParam($request->getDataAttributeId()),
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
