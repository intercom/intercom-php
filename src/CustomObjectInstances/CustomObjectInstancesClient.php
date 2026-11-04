<?php

namespace Intercom\CustomObjectInstances;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\CustomObjectInstances\Requests\GetCustomObjectInstancesByExternalIdRequest;
use Intercom\CustomObjectInstances\Types\CustomObjectInstance;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\CustomObjectInstances\Requests\CreateOrUpdateCustomObjectInstanceRequest;
use Intercom\CustomObjectInstances\Requests\DeleteCustomObjectInstancesByIdRequest;
use Intercom\Types\CustomObjectInstanceDeleted;
use Intercom\CustomObjectInstances\Requests\GetCustomObjectInstancesByIdRequest;
use Intercom\CustomObjectInstances\Requests\DeleteCustomObjectInstancesByExternalIdRequest;

class CustomObjectInstancesClient
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
     * Fetch a Custom Object Instance by external_id.
     *
     * Example:
     * ```php
     * $client->customObjectInstances->getCustomObjectInstancesByExternalId(
     *     new GetCustomObjectInstancesByExternalIdRequest([
     *         'customObjectTypeIdentifier' => 'Order',
     *         'externalId' => 'external_id',
     *     ]),
     * );
     * ```
     *
     * @param GetCustomObjectInstancesByExternalIdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomObjectInstance
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function getCustomObjectInstancesByExternalId(GetCustomObjectInstancesByExternalIdRequest $request, ?array $options = null): ?CustomObjectInstance
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['external_id'] = $request->getExternalId();
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_object_instances/" . RawClient::encodePathParam($request->getCustomObjectTypeIdentifier()),
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
                return CustomObjectInstance::fromJson($json);
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
     * Create or update a custom object instance
     *
     * Example:
     * ```php
     * $client->customObjectInstances->createCustomObjectInstances(
     *     new CreateOrUpdateCustomObjectInstanceRequest([
     *         'customObjectTypeIdentifier' => 'Order',
     *         'externalId' => '123',
     *         'externalCreatedAt' => 1392036272,
     *         'externalUpdatedAt' => 1392036272,
     *         'customAttributes' => [
     *             'order_number' => 'ORDER-12345',
     *             'total_amount' => 'custom_attributes',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param CreateOrUpdateCustomObjectInstanceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomObjectInstance
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createCustomObjectInstances(CreateOrUpdateCustomObjectInstanceRequest $request, ?array $options = null): ?CustomObjectInstance
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_object_instances/" . RawClient::encodePathParam($request->getCustomObjectTypeIdentifier()),
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
                return CustomObjectInstance::fromJson($json);
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
     * Delete a single Custom Object instance by external_id.
     *
     * Example:
     * ```php
     * $client->customObjectInstances->deleteCustomObjectInstancesById(
     *     new DeleteCustomObjectInstancesByIdRequest([
     *         'customObjectTypeIdentifier' => 'Order',
     *         'externalId' => 'external_id',
     *     ]),
     * );
     * ```
     *
     * @param DeleteCustomObjectInstancesByIdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomObjectInstanceDeleted
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteCustomObjectInstancesById(DeleteCustomObjectInstancesByIdRequest $request, ?array $options = null): ?CustomObjectInstanceDeleted
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['external_id'] = $request->getExternalId();
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_object_instances/" . RawClient::encodePathParam($request->getCustomObjectTypeIdentifier()),
                    method: HttpMethod::DELETE,
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
                return CustomObjectInstanceDeleted::fromJson($json);
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
     * Fetch a Custom Object Instance by id.
     *
     * Example:
     * ```php
     * $client->customObjectInstances->getCustomObjectInstancesById(
     *     new GetCustomObjectInstancesByIdRequest([
     *         'customObjectTypeIdentifier' => 'Order',
     *         'customObjectInstanceId' => 'custom_object_instance_id',
     *     ]),
     * );
     * ```
     *
     * @param GetCustomObjectInstancesByIdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomObjectInstance
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function getCustomObjectInstancesById(GetCustomObjectInstancesByIdRequest $request, ?array $options = null): ?CustomObjectInstance
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_object_instances/" . RawClient::encodePathParam($request->getCustomObjectTypeIdentifier()) . "/" . RawClient::encodePathParam($request->getCustomObjectInstanceId()),
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
                return CustomObjectInstance::fromJson($json);
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
     * Delete a single Custom Object instance using the Intercom defined id.
     *
     * Example:
     * ```php
     * $client->customObjectInstances->deleteCustomObjectInstancesByExternalId(
     *     new DeleteCustomObjectInstancesByExternalIdRequest([
     *         'customObjectTypeIdentifier' => 'Order',
     *         'customObjectInstanceId' => 'custom_object_instance_id',
     *     ]),
     * );
     * ```
     *
     * @param DeleteCustomObjectInstancesByExternalIdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CustomObjectInstanceDeleted
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteCustomObjectInstancesByExternalId(DeleteCustomObjectInstancesByExternalIdRequest $request, ?array $options = null): ?CustomObjectInstanceDeleted
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "custom_object_instances/" . RawClient::encodePathParam($request->getCustomObjectTypeIdentifier()) . "/" . RawClient::encodePathParam($request->getCustomObjectInstanceId()),
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
                return CustomObjectInstanceDeleted::fromJson($json);
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
