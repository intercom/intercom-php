<?php

namespace Intercom;

use Intercom\Admins\AdminsClient;
use Intercom\Articles\ArticlesClient;
use Intercom\HelpCenters\HelpCentersClient;
use Intercom\Companies\CompaniesClient;
use Intercom\Contacts\ContactsClient;
use Intercom\Notes\NotesClient;
use Intercom\Tags\TagsClient;
use Intercom\Conversations\ConversationsClient;
use Intercom\DataAttributes\DataAttributesClient;
use Intercom\Events\EventsClient;
use Intercom\DataExport\DataExportClient;
use Intercom\Messages\MessagesClient;
use Intercom\Segments\SegmentsClient;
use Intercom\SubscriptionTypes\SubscriptionTypesClient;
use Intercom\PhoneCallRedirects\PhoneCallRedirectsClient;
use Intercom\Teams\TeamsClient;
use Intercom\TicketTypes\TicketTypesClient;
use Intercom\Tickets\TicketsClient;
use Intercom\Visitors\VisitorsClient;
use Intercom\News\NewsClient;
use Intercom\Unstable\UnstableClient;
use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;
use Exception;

class IntercomClient
{
    /**
     * @var AdminsClient $admins
     */
    public AdminsClient $admins;

    /**
     * @var ArticlesClient $articles
     */
    public ArticlesClient $articles;

    /**
     * @var HelpCentersClient $helpCenters
     */
    public HelpCentersClient $helpCenters;

    /**
     * @var CompaniesClient $companies
     */
    public CompaniesClient $companies;

    /**
     * @var ContactsClient $contacts
     */
    public ContactsClient $contacts;

    /**
     * @var NotesClient $notes
     */
    public NotesClient $notes;

    /**
     * @var TagsClient $tags
     */
    public TagsClient $tags;

    /**
     * @var ConversationsClient $conversations
     */
    public ConversationsClient $conversations;

    /**
     * @var DataAttributesClient $dataAttributes
     */
    public DataAttributesClient $dataAttributes;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var DataExportClient $dataExport
     */
    public DataExportClient $dataExport;

    /**
     * @var MessagesClient $messages
     */
    public MessagesClient $messages;

    /**
     * @var SegmentsClient $segments
     */
    public SegmentsClient $segments;

    /**
     * @var SubscriptionTypesClient $subscriptionTypes
     */
    public SubscriptionTypesClient $subscriptionTypes;

    /**
     * @var PhoneCallRedirectsClient $phoneCallRedirects
     */
    public PhoneCallRedirectsClient $phoneCallRedirects;

    /**
     * @var TeamsClient $teams
     */
    public TeamsClient $teams;

    /**
     * @var TicketTypesClient $ticketTypes
     */
    public TicketTypesClient $ticketTypes;

    /**
     * @var TicketsClient $tickets
     */
    public TicketsClient $tickets;

    /**
     * @var VisitorsClient $visitors
     */
    public VisitorsClient $visitors;

    /**
     * @var NewsClient $news
     */
    public NewsClient $news;

    /**
     * @var UnstableClient $unstable
     */
    public UnstableClient $unstable;

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
     * @param ?string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $token = null,
        ?array $options = null,
    ) {
        $token ??= $this->getFromEnvOrThrow('INTERCOM_API_KEY', 'Please pass in token or set the environment variable INTERCOM_API_KEY.');
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Intercom',
            'X-Fern-SDK-Version' => '0.0.325',
            'User-Agent' => 'intercom/intercom-php/0.0.325',
            'Intercom-Version' => '2.11',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->admins = new AdminsClient($this->client, $this->options);
        $this->articles = new ArticlesClient($this->client, $this->options);
        $this->helpCenters = new HelpCentersClient($this->client, $this->options);
        $this->companies = new CompaniesClient($this->client, $this->options);
        $this->contacts = new ContactsClient($this->client, $this->options);
        $this->notes = new NotesClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->dataAttributes = new DataAttributesClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->dataExport = new DataExportClient($this->client, $this->options);
        $this->messages = new MessagesClient($this->client, $this->options);
        $this->segments = new SegmentsClient($this->client, $this->options);
        $this->subscriptionTypes = new SubscriptionTypesClient($this->client, $this->options);
        $this->phoneCallRedirects = new PhoneCallRedirectsClient($this->client, $this->options);
        $this->teams = new TeamsClient($this->client, $this->options);
        $this->ticketTypes = new TicketTypesClient($this->client, $this->options);
        $this->tickets = new TicketsClient($this->client, $this->options);
        $this->visitors = new VisitorsClient($this->client, $this->options);
        $this->news = new NewsClient($this->client, $this->options);
        $this->unstable = new UnstableClient($this->client, $this->options);
    }

    /**
     * @param string $env
     * @param string $message
     * @return string
     */
    private function getFromEnvOrThrow(string $env, string $message): string
    {
        $value = getenv($env);
        return $value ? (string) $value : throw new Exception($message);
    }
}
