<?php

namespace Intercom;

use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication;
use Http\Message\Authentication\BasicAuth;
use Http\Message\Authentication\Bearer;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use stdClass;

class IntercomClient
{
    const SDK_VERSION = '4.4.0';

    /**
     * @var ClientInterface $httpClient
     */
    private $httpClient;

    /**
     * @var RequestFactoryInterface $requestFactory
     */
    private $requestFactory;

    /**
     * @var UriFactoryInterface $uriFactory
     */
    private $uriFactory;

    /**
     * @var StreamFactoryInterface $streamFactory
     */
    private $streamFactory;

    /**
     * @var string API user authentication
     */
    private $appIdOrToken;

    /**
     * @var string API password authentication
     */
    private $passwordPart;

    /**
     * @var array $extraRequestHeaders
     */
    private $extraRequestHeaders;

    /**
     * @var IntercomUsers $users
     */
    public $users;

    /**
     * @var IntercomEvents $events
     */
    public $events;

    /**
     * @var IntercomCompanies $companies
     */
    public $companies;

    /**
     * @var IntercomContacts $contacts
     */
    public $contacts;

    /**
     * @var IntercomMessages $messages
     */
    public $messages;

    /**
     * @var IntercomConversations $conversations
     */
    public $conversations;

    /**
     * @var IntercomLeads $leads
     */
    public $leads;

    /**
     * @var IntercomVisitors $visitors
     */
    public $visitors;

    /**
     * @var IntercomAdmins $admins
     */
    public $admins;

    /**
     * @var IntercomTags $tags
     */
    public $tags;

    /**
     * @var IntercomSegments $segments
     */
    public $segments;

    /**
     * @var IntercomCounts $counts
     */
    public $counts;

    /**
     * @var IntercomBulk $bulk
     */
    public $bulk;

    /**
     * @var IntercomNotes $notes
     */
    public $notes;

    /**
     * @var IntercomTeams $teams
     */
    public $teams;

    /**
     * @var array $rateLimitDetails
     */
    protected $rateLimitDetails = [];

    /**
     * IntercomClient constructor.
     *
     * @param string $appIdOrToken App ID.
     * @param string|null $password Api Key.
     * @param array $extraRequestHeaders Extra request headers to be sent in every api request
     */
    public function __construct(string $appIdOrToken, string $password = null, array $extraRequestHeaders = [])
    {
        $this->users = new IntercomUsers($this);
        $this->contacts = new IntercomContacts($this);
        $this->events = new IntercomEvents($this);
        $this->companies = new IntercomCompanies($this);
        $this->messages = new IntercomMessages($this);
        $this->conversations = new IntercomConversations($this);
        $this->leads = new IntercomLeads($this);
        $this->visitors = new IntercomVisitors($this);
        $this->admins = new IntercomAdmins($this);
        $this->tags = new IntercomTags($this);
        $this->segments = new IntercomSegments($this);
        $this->counts = new IntercomCounts($this);
        $this->bulk = new IntercomBulk($this);
        $this->notes = new IntercomNotes($this);
        $this->teams = new IntercomTeams($this);

        $this->appIdOrToken = $appIdOrToken;
        $this->passwordPart = $password;
        $this->extraRequestHeaders = $extraRequestHeaders;

        $this->httpClient = $this->getDefaultHttpClient();
        $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $this->uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $this->streamFactory =  Psr17FactoryDiscovery::findStreamFactory();
    }

    /**
     * Sets the HTTP client.
     *
     * @param ClientInterface  $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Sets the request factory.
     *
     * @param RequestFactoryInterface $requestFactory
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory)
    {
        $this->requestFactory = $requestFactory;
    }

    /**
     * Sets the URI factory.
     *
     * @param UriFactoryInterface $uriFactory
     */
    public function setUriFactory(UriFactoryInterface $uriFactory)
    {
        $this->uriFactory = $uriFactory;
    }

    /**
     * Sets the stream factory.
     *
     * @param StreamFactoryInterface $streamFactory
     */
    public function setStreamFactory(StreamFactoryInterface $streamFactory)
    {
        $this->streamFactory = $streamFactory;
    }

    /**
     * Sends POST request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function post($endpoint, $json)
    {
        $response = $this->sendRequest('POST', "https://api.intercom.io/$endpoint", $json);
        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function put($endpoint, $json)
    {
        $response = $this->sendRequest('PUT', "https://api.intercom.io/$endpoint", $json);
        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Intercom API.
     *
     * @param  string $endpoint
     * @param  array $json
     * @return stdClass
     */
    public function delete($endpoint, $json)
    {
        $response = $this->sendRequest('DELETE', "https://api.intercom.io/$endpoint", $json);
        return $this->handleResponse($response);
    }

    /**
     * Sends GET request to Intercom API.
     *
     * @param string $endpoint
     * @param array  $queryParams
     * @return stdClass
     */
    public function get($endpoint, $queryParams = [])
    {
        $uri = $this->uriFactory->createUri("https://api.intercom.io/$endpoint");
        if (!empty($queryParams)) {
            $uri = $uri->withQuery(http_build_query($queryParams));
        }

        $response = $this->sendRequest('GET', $uri);

        return $this->handleResponse($response);
    }

    /**
     * Returns the next page of the result.
     *
     * @param  stdClass $pages
     * @return stdClass
     */
    public function nextPage($pages)
    {
        $response = $this->sendRequest('GET', $pages->next);
        return $this->handleResponse($response);
    }

    /**
     * Returns the next page of the result for a search query.
     *
     * @param  string $path
     * @param  array $query
     * @param  stdClass $pages
     * @return stdClass
     */
    public function nextSearchPage(string $path, array $query, $pages)
    {
        $options = [
            "query" => $query,
            "pagination" => [
                "per_page" => $pages->per_page,
                "starting_after" => $pages->next->starting_after,
            ]
        ];
        return $this->post($path, $options);
    }

    /**
     * Returns the next page of the result for a cursor based search.
     *
     * @param string $path
     * @param string $startingAfter
     * @return stdClass
     */
    public function nextCursorPage(string $path, string $startingAfter)
    {
        return $this->get($path . "?starting_after=" . $startingAfter);
    }

    /**
     * Gets the rate limit details.
     *
     * @return array
     */
    public function getRateLimitDetails()
    {
        return $this->rateLimitDetails;
    }

    /**
     * @return ClientInterface
     */
    private function getDefaultHttpClient()
    {
        return new PluginClient(
            Psr18ClientDiscovery::find(),
            [new ErrorPlugin()]
        );
    }

    /**
     * @return array
     */
    private function getRequestHeaders()
    {
        return array_merge(
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Intercom-PHP/' . self::SDK_VERSION,
            ],
            $this->extraRequestHeaders
        );
    }

    /**
     * Returns authentication parameters
     *
     * @return Authentication
     */
    private function getAuth()
    {
        if (!empty($this->appIdOrToken) && !empty($this->passwordPart)) {
            return new BasicAuth($this->appIdOrToken, $this->passwordPart);
        } elseif (!empty($this->appIdOrToken)) {
            return new Bearer($this->appIdOrToken);
        }
        return null;
    }

    /**
     * Authenticates a request object
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    private function authenticateRequest(RequestInterface $request)
    {
        $auth = $this->getAuth();
        return $auth ? $auth->authenticate($request) : $request;
    }

    /**
     * @param string              $method
     * @param string|UriInterface $uri
     * @param array|string|null   $body
     *
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    private function sendRequest($method, $uri, $body = null)
    {
        $body = is_array($body) ? json_encode($body) : $body;
        $request = $this->requestFactory
            ->createRequest($method, $uri);

        if ($body !== null) {
            $request = $request
                ->withBody($this->streamFactory->createStream($body));
        }

        foreach ($this->getRequestHeaders() as $name => $value) {
            $request = $request
                ->withHeader($name, $value);
        }

        $request = $this->authenticateRequest($request);

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return stdClass
     */
    private function handleResponse(ResponseInterface $response)
    {
        $this->setRateLimitDetails($response);

        $stream = $response->getBody()->getContents();

        return json_decode($stream);
    }

    /**
     * @param ResponseInterface $response
     */
    private function setRateLimitDetails(ResponseInterface $response)
    {
        $this->rateLimitDetails = [
            'limit' => $response->hasHeader('X-RateLimit-Limit')
                ? (int)$response->getHeader('X-RateLimit-Limit')[0]
                : null,
            'remaining' => $response->hasHeader('X-RateLimit-Remaining')
                ? (int)$response->getHeader('X-RateLimit-Remaining')[0]
                : null,
            'reset_at' => $response->hasHeader('X-RateLimit-Reset')
                ? (new \DateTimeImmutable())->setTimestamp((int)$response->getHeader('X-RateLimit-Reset')[0])
                : null,
        ];
    }
}
