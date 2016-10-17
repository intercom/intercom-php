<?php

namespace Intercom;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;

class IntercomClient
{

    /** @var Client $http_client */
    private $http_client;

    /** @var string API user authentication */
    protected $usernamePart;

    /** @var string API password authentication */
    protected $passwordPart;

    /** @var IntercomUsers $users */
    public $users;

    /** @var IntercomEvents $events */
    public $events;

    /** @var IntercomCompanies $companies */
    public $companies;

    /** @var IntercomMessages $messages */
    public $messages;

    /** @var IntercomConversations $conversations */
    public $conversations;

    /** @var IntercomLeads $leads */
    public $leads;

    /** @var IntercomAdmins $admins */
    public $admins;

    /** @var IntercomTags $tags */
    public $tags;

    /** @var IntercomSegments $segments */
    public $segments;

    /** @var IntercomCounts $counts */
    public $counts;

    /** @var IntercomBulk $bulk */
    public $bulk;

    /**
     * IntercomClient constructor.
     * @param string $usernamePart App ID.
     * @param string $passwordPart Api Key.
     */
    public function __construct($usernamePart, $passwordPart)
    {
        $this->setDefaultClient();
        $this->users = new IntercomUsers($this);
        $this->events = new IntercomEvents($this);
        $this->companies = new IntercomCompanies($this);
        $this->messages = new IntercomMessages($this);
        $this->conversations = new IntercomConversations($this);
        $this->leads = new IntercomLeads($this);
        $this->admins = new IntercomAdmins($this);
        $this->tags = new IntercomTags($this);
        $this->segments = new IntercomSegments($this);
        $this->counts = new IntercomCounts($this);
        $this->bulk = new IntercomBulk($this);
        $this->notes = new IntercomNotes($this);
        $this->segments = new IntercomSegments($this);

        $this->usernamePart = $usernamePart;
        $this->passwordPart = $passwordPart;
    }

    private function setDefaultClient()
    {
        $this->http_client = new Client();
    }

    /**
     * Sets GuzzleHttp client.
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->http_client = $client;
    }

    /**
     * Sends POST request to Intercom API.
     * @param string $endpoint
     * @param string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($endpoint, $json)
    {
        $response = $this->http_client->request('POST', "https://api.intercom.io/$endpoint", [
            'json' => $json,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Intercom API.
     * @param string $endpoint
     * @param string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($endpoint, $json)
    {
        $response = $this->http_client->request('DELETE', "https://api.intercom.io/$endpoint", [
            'json' => $json,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $this->handleResponse($response);
    }

    /**
     * @param string $endpoint
     * @param string $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($endpoint, $query)
    {
        $response = $this->http_client->request('GET', "https://api.intercom.io/$endpoint", [
            'query' => $query,
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $this->handleResponse($response);
    }

    /**
     * Returns next page of the result.
     * @param array $pages
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function nextPage($pages)
    {
        $response = $this->http_client->request('GET', $pages['next'], [
            'auth' => $this->getAuth(),
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $this->handleResponse($response);
    }

    /**
     * Returns authentication parameters.
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
        $stream = stream_for($response->getBody());
        $data = json_decode($stream->getContents());
        return $data;
    }
}
