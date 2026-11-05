<?php

namespace Intercom\Unstable\Companies;

use Psr\Http\Client\ClientInterface;
use Intercom\Core\Client\RawClient;
use Intercom\Unstable\Companies\Requests\RetrieveCompanyRequest;
use Intercom\Unstable\Types\CompanyList;
use Intercom\Exceptions\IntercomException;
use Intercom\Exceptions\IntercomApiException;
use Intercom\Core\Json\JsonApiRequest;
use Intercom\Environments;
use Intercom\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Intercom\Unstable\Companies\Types\Company;
use Intercom\Unstable\Companies\Requests\RetrieveACompanyByIdRequest;
use Intercom\Unstable\Companies\Requests\UpdateCompanyRequest;
use Intercom\Unstable\Companies\Requests\DeleteCompanyRequest;
use Intercom\Unstable\Types\DeletedCompanyObject;
use Intercom\Unstable\Companies\Requests\ListAttachedContactsRequest;
use Intercom\Unstable\Types\CompanyAttachedContacts;
use Intercom\Unstable\Companies\Requests\ListAttachedSegmentsForCompaniesRequest;
use Intercom\Unstable\Types\CompanyAttachedSegments;
use Intercom\Unstable\Companies\Requests\ListAllCompaniesRequest;
use Intercom\Unstable\Companies\Requests\ScrollOverAllCompaniesRequest;
use Intercom\Unstable\Types\CompanyScroll;
use Intercom\Unstable\Companies\Requests\AttachContactToACompanyRequest;
use Intercom\Unstable\Companies\Requests\DetachContactFromACompanyRequest;

class CompaniesClient
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
     * You can fetch a single company by passing in `company_id` or `name`.
     *
     *   `https://api.intercom.io/companies?name={name}`
     *
     *   `https://api.intercom.io/companies?company_id={company_id}`
     *
     * You can fetch all companies and filter by `segment_id` or `tag_id` as a query parameter.
     *
     *   `https://api.intercom.io/companies?tag_id={tag_id}`
     *
     *   `https://api.intercom.io/companies?segment_id={segment_id}`
     *
     * Example:
     * ```php
     * $client->companies->retrieve(
     *     new RetrieveCompanyRequest([
     *         'name' => 'my company',
     *         'companyId' => '12345',
     *         'tagId' => '678910',
     *         'segmentId' => '98765',
     *         'page' => 1,
     *         'perPage' => 1,
     *     ]),
     * );
     * ```
     *
     * @param RetrieveCompanyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompanyList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function retrieveCompany(RetrieveCompanyRequest $request = new RetrieveCompanyRequest(), ?array $options = null): ?CompanyList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getName() != null) {
            $query['name'] = $request->getName();
        }
        if ($request->getCompanyId() != null) {
            $query['company_id'] = $request->getCompanyId();
        }
        if ($request->getTagId() != null) {
            $query['tag_id'] = $request->getTagId();
        }
        if ($request->getSegmentId() != null) {
            $query['segment_id'] = $request->getSegmentId();
        }
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
                    path: "companies",
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
                return CompanyList::fromJson($json);
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
     * You can create or update a company.
     *
     * Companies will be only visible in Intercom when there is at least one associated user.
     *
     * Companies are looked up via `company_id` in a `POST` request, if not found via `company_id`, the new company will be created, if found, that company will be updated.
     *
     * {% admonition type="warning" name="Using `company_id`" %}
     *   You can set a unique `company_id` value when creating a company. However, it is not possible to update `company_id`. Be sure to set a unique value once upon creation of the company.
     * {% /admonition %}
     *
     * Example:
     * ```php
     * $client->unstable->companies->createOrUpdateCompany(
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
     * @return ?Company
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function createOrUpdateCompany(mixed $request, ?array $options = null): ?Company
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies",
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
                return Company::fromJson($json);
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
     * You can fetch a single company.
     *
     * Example:
     * ```php
     * $client->unstable->companies->retrieveACompanyById(
     *     new RetrieveACompanyByIdRequest([
     *         'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
     *     ]),
     * );
     * ```
     *
     * @param RetrieveACompanyByIdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Company
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function retrieveACompanyById(RetrieveACompanyByIdRequest $request, ?array $options = null): ?Company
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/" . RawClient::encodePathParam($request->getId()),
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
                return Company::fromJson($json);
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
     * You can update a single company using the Intercom provisioned `id`.
     *
     * {% admonition type="warning" name="Using `company_id`" %}
     *   When updating a company it is not possible to update `company_id`. This can only be set once upon creation of the company.
     * {% /admonition %}
     *
     * Example:
     * ```php
     * $client->unstable->companies->updateCompany(
     *     new UpdateCompanyRequest([
     *         'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
     *     ]),
     * );
     * ```
     *
     * @param UpdateCompanyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Company
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function updateCompany(UpdateCompanyRequest $request, ?array $options = null): ?Company
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/" . RawClient::encodePathParam($request->getId()),
                    method: HttpMethod::PUT,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Company::fromJson($json);
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
     * You can delete a single company.
     *
     * Example:
     * ```php
     * $client->unstable->companies->deleteCompany(
     *     new DeleteCompanyRequest([
     *         'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
     *     ]),
     * );
     * ```
     *
     * @param DeleteCompanyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeletedCompanyObject
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function deleteCompany(DeleteCompanyRequest $request, ?array $options = null): ?DeletedCompanyObject
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/" . RawClient::encodePathParam($request->getId()),
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
                return DeletedCompanyObject::fromJson($json);
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
     * You can fetch a list of all contacts that belong to a company.
     *
     * Example:
     * ```php
     * $client->unstable->companies->listAttachedContacts(
     *     new ListAttachedContactsRequest([
     *         'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
     *     ]),
     * );
     * ```
     *
     * @param ListAttachedContactsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompanyAttachedContacts
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAttachedContacts(ListAttachedContactsRequest $request, ?array $options = null): ?CompanyAttachedContacts
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/" . RawClient::encodePathParam($request->getId()) . "/contacts",
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
                return CompanyAttachedContacts::fromJson($json);
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
     * You can fetch a list of all segments that belong to a company.
     *
     * Example:
     * ```php
     * $client->unstable->companies->listAttachedSegmentsForCompanies(
     *     new ListAttachedSegmentsForCompaniesRequest([
     *         'id' => '5f4d3c1c-7b1b-4d7d-a97e-6095715c6632',
     *     ]),
     * );
     * ```
     *
     * @param ListAttachedSegmentsForCompaniesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompanyAttachedSegments
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAttachedSegmentsForCompanies(ListAttachedSegmentsForCompaniesRequest $request, ?array $options = null): ?CompanyAttachedSegments
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/" . RawClient::encodePathParam($request->getId()) . "/segments",
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
                return CompanyAttachedSegments::fromJson($json);
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
     * You can list companies. The company list is sorted by the `last_request_at` field and by default is ordered descending, most recently requested first.
     *
     * Note that the API does not include companies who have no associated users in list responses.
     *
     * When using the Companies endpoint and the pages object to iterate through the returned companies, there is a limit of 10,000 Companies that can be returned. If you need to list or iterate on more than 10,000 Companies, please use the [Scroll API](https://developers.intercom.com/reference#iterating-over-all-companies).
     * {% admonition type="warning" name="Pagination" %}
     *   You can use pagination to limit the number of results returned. The default is `20` results per page.
     *   See the [pagination section](https://developers.intercom.com/docs/build-an-integration/learn-more/rest-apis/pagination/#pagination-for-list-apis) for more details on how to use the `starting_after` param.
     * {% /admonition %}
     *
     * Example:
     * ```php
     * $client->companies->list(
     *     new ListCompaniesRequest([
     *         'page' => 1,
     *         'perPage' => 1,
     *         'order' => 'desc',
     *     ]),
     * );
     * ```
     *
     * @param ListAllCompaniesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompanyList
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function listAllCompanies(ListAllCompaniesRequest $request = new ListAllCompaniesRequest(), ?array $options = null): ?CompanyList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getPage() != null) {
            $query['page'] = $request->getPage();
        }
        if ($request->getPerPage() != null) {
            $query['per_page'] = $request->getPerPage();
        }
        if ($request->getOrder() != null) {
            $query['order'] = $request->getOrder();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/list",
                    method: HttpMethod::POST,
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
                return CompanyList::fromJson($json);
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
     *       The `list all companies` functionality does not work well for huge datasets, and can result in errors and performance problems when paging deeply. The Scroll API provides an efficient mechanism for iterating over all companies in a dataset.
     *
     * - Each app can only have 1 scroll open at a time. You'll get an error message if you try to have more than one open per app.
     * - If the scroll isn't used for 1 minute, it expires and calls with that scroll param will fail
     * - If the end of the scroll is reached, "companies" will be empty and the scroll parameter will expire
     *
     * {% admonition type="info" name="Scroll Parameter" %}
     *   You can get the first page of companies by simply sending a GET request to the scroll endpoint.
     *   For subsequent requests you will need to use the scroll parameter from the response.
     * {% /admonition %}
     * {% admonition type="danger" name="Scroll network timeouts" %}
     *   Since scroll is often used on large datasets network errors such as timeouts can be encountered. When this occurs you will see a HTTP 500 error with the following message:
     *   "Request failed due to an internal network error. Please restart the scroll operation."
     *   If this happens, you will need to restart your scroll query: It is not possible to continue from a specific point when using scroll.
     * {% /admonition %}
     *
     * Example:
     * ```php
     * $client->companies->scroll(
     *     new ScrollCompaniesRequest([
     *         'scrollParam' => 'scroll_param',
     *     ]),
     * );
     * ```
     *
     * @param ScrollOverAllCompaniesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompanyScroll
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function scrollOverAllCompanies(ScrollOverAllCompaniesRequest $request = new ScrollOverAllCompaniesRequest(), ?array $options = null): ?CompanyScroll
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getScrollParam() != null) {
            $query['scroll_param'] = $request->getScrollParam();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "companies/scroll",
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
                return CompanyScroll::fromJson($json);
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
     * You can attach a company to a single contact.
     *
     * Example:
     * ```php
     * $client->unstable->companies->attachContactToACompany(
     *     new AttachContactToACompanyRequest([
     *         'id' => 'id',
     *         'companyId' => '6762f09a1bb69f9f2193bb34',
     *     ]),
     * );
     * ```
     *
     * @param AttachContactToACompanyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Company
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function attachContactToACompany(AttachContactToACompanyRequest $request, ?array $options = null): ?Company
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getId()) . "/companies",
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
                return Company::fromJson($json);
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
     * You can detach a company from a single contact.
     *
     * Example:
     * ```php
     * $client->unstable->companies->detachContactFromACompany(
     *     new DetachContactFromACompanyRequest([
     *         'contactId' => '58a430d35458202d41b1e65b',
     *         'id' => '58a430d35458202d41b1e65b',
     *     ]),
     * );
     * ```
     *
     * @param DetachContactFromACompanyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Company
     * @throws IntercomException
     * @throws IntercomApiException
     */
    public function detachContactFromACompany(DetachContactFromACompanyRequest $request, ?array $options = null): ?Company
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::UsProduction->value,
                    path: "contacts/" . RawClient::encodePathParam($request->getContactId()) . "/companies/" . RawClient::encodePathParam($request->getId()),
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
                return Company::fromJson($json);
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
