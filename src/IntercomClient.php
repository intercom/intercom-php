<?php

namespace Intercom;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class IntercomClient
{

    /**
     * @var Client $http_client
     */
    private $http_client;

    /**
     * @var string API user authentication
     */
    protected $usernamePart;

    /**
     * @var string API password authentication
     */
    protected $passwordPart;

    /**
     * @var string Extra Guzzle Requests Options
     */
    protected $extraGuzzleRequestsOptions;

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
     * @var int[] $rateLimitDetails
     */
    protected $rateLimitDetails = [];

    /**
     * IntercomClient constructor.
     *
     * @param string $usernamePart App ID.
     * @param string $passwordPart Api Key.
     */
    public function __construct($usernamePart, $passwordPart, $extraGuzzleRequestsOptions = [])
    {
        $this->setDefaultClient();
        $this->users = new IntercomUsers($this);
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

        $this->usernamePart = $usernamePart;
        $this->passwordPart = $passwordPart;
        $this->extraGuzzleRequestsOptions = $extraGuzzleRequestsOptions;
    }

    private function setDefaultClient()
    {
        $this->http_client = new Client();
    }

    /**
     * Sets GuzzleHttp client.
     *
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->http_client = $client;
    }

    /**
     * Sends POST request to Intercom API.
     *
     * @param  string $endpoint
     * @param  string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($endpoint, $json)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'json' => $json,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ],
            ]
        );
        $response = $this->http_client->request('POST', "https://api.intercom.io/$endpoint", $guzzleRequestOptions);
        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Intercom API.
     *
     * @param  string $endpoint
     * @param  string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($endpoint, $json)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'json' => $json,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ],
            ]
        );

        $response = $this->http_client->request('PUT', "https://api.intercom.io/$endpoint", $guzzleRequestOptions);
        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Intercom API.
     *
     * @param  string $endpoint
     * @param  string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($endpoint, $json)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'json' => $json,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ],
            ]
        );

        $response = $this->http_client->request('DELETE', "https://api.intercom.io/$endpoint", $guzzleRequestOptions);
        return $this->handleResponse($response);
    }

    /**
     * @param string $endpoint
     * @param array  $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($endpoint, $query)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'query' => $query,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ],
            ]
        );

        $response = $this->http_client->request('GET', "https://api.intercom.io/$endpoint", $guzzleRequestOptions);
        return $this->handleResponse($response);
    }

    /**
     * Returns next page of the result.
     *
     * @param  \stdClass $pages
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function nextPage($pages)
    {
        $guzzleRequestOptions = $this->getGuzzleRequestOptions(
            [
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ],
            ]
        );

        $response = $this->http_client->request('GET', $pages->next, $guzzleRequestOptions);
        return $this->handleResponse($response);
    }

    /**
     * Returns Guzzle Requests Options Array
     *
     * @param  array $defaultGuzzleRequestsOptions
     * @return array
     */
    public function getGuzzleRequestOptions($defaultGuzzleRequestOptions = [])
    {
        return array_replace_recursive($this->extraGuzzleRequestsOptions, $defaultGuzzleRequestOptions);
    }

    /**
     * Returns authentication parameters.
     *
     * @return array
     */
    public function getAuth()
    {
        return [$this->usernamePart, $this->passwordPart];
    }

    /**
     * @param Response $response
     * @return mixed
     */
    private function handleResponse(Response $response)
    {
        $this->setRateLimitDetails($response);

        $stream = \GuzzleHttp\Psr7\stream_for($response->getBody());
        $data = json_decode($stream);
        return $data;
    }

    /**
     * @param Response $response
     * @return void
     */
    private function setRateLimitDetails(Response $response)
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

    /**
     * @return int[]
     */
    public function getRateLimitDetails()
    {
        return $this->rateLimitDetails;
    }
}
