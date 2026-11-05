<?php

namespace Intercom\Unstable\TicketTypeAttributes;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\TicketTypeAttributes\Requests\CreateTicketTypeAttributeRequest;
use Intercom\Unstable\Types\TicketTypeAttribute;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\TicketTypeAttributes\Requests\UpdateTicketTypeAttributeRequest;

class TicketTypeAttributesClient
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
     * You can create a new attribute for a ticket type.
     *
     * Example:
     * ```php
     * $client->ticketTypes->attributes->create(
     *     new CreateTicketTypeAttributeRequest([
     *         'ticketTypeId' => 'ticket_type_id',
     *         'name' => 'Attribute Title',
     *         'description' => 'Attribute Description',
     *         'dataType' => CreateTicketTypeAttributeRequestDataType::String->value,
     *         'requiredToCreate' => false,
     *     ]),
     * );
     * ```
     *
     * @param CreateTicketTypeAttributeRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TicketTypeAttribute
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createTicketTypeAttribute(CreateTicketTypeAttributeRequest $request, ?array $options = null): ?TicketTypeAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "ticket_types/" . RawClient::encodePathParam($request->getTicketTypeId()) . "/attributes",
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
                return TicketTypeAttribute::fromJson($json);
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
     * You can update an existing attribute for a ticket type.
     *
     * Example:
     * ```php
     * $client->unstable->ticketTypeAttributes->updateTicketTypeAttribute(
     *     new UpdateTicketTypeAttributeRequest([
     *         'ticketTypeId' => 'ticket_type_id',
     *         'id' => 'id',
     *         'description' => 'New Attribute Description',
     *     ]),
     * );
     * ```
     *
     * @param UpdateTicketTypeAttributeRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TicketTypeAttribute
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateTicketTypeAttribute(UpdateTicketTypeAttributeRequest $request, ?array $options = null): ?TicketTypeAttribute
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "ticket_types/" . RawClient::encodePathParam($request->getTicketTypeId()) . "/attributes/" . RawClient::encodePathParam($request->getId()),
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
                return TicketTypeAttribute::fromJson($json);
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
