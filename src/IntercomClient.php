<?php

namespace Intercom;

use Intercom\Admins\AdminsClient;
use Intercom\AiContent\AiContentClient;
use Intercom\Articles\ArticlesClient;
use Intercom\AwayStatusReasons\AwayStatusReasonsClient;
use Intercom\Export\ExportClient;
use Intercom\DataExport\DataExportClient;
use Intercom\HelpCenters\HelpCentersClient;
use Intercom\InternalArticles\InternalArticlesClient;
use Intercom\Companies\CompaniesClient;
use Intercom\Contacts\ContactsClient;
use Intercom\Notes\NotesClient;
use Intercom\Tags\TagsClient;
use Intercom\Conversations\ConversationsClient;
use Intercom\CustomChannelEvents\CustomChannelEventsClient;
use Intercom\CustomObjectInstances\CustomObjectInstancesClient;
use Intercom\DataAttributes\DataAttributesClient;
use Intercom\Events\EventsClient;
use Intercom\Jobs\JobsClient;
use Intercom\Messages\MessagesClient;
use Intercom\Segments\SegmentsClient;
use Intercom\SubscriptionTypes\SubscriptionTypesClient;
use Intercom\PhoneCallRedirects\PhoneCallRedirectsClient;
use Intercom\Calls\CallsClient;
use Intercom\Teams\TeamsClient;
use Intercom\TicketStates\TicketStatesClient;
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
     * @var AiContentClient $aiContent
     */
    public AiContentClient $aiContent;

    /**
     * @var ArticlesClient $articles
     */
    public ArticlesClient $articles;

    /**
     * @var AwayStatusReasonsClient $awayStatusReasons
     */
    public AwayStatusReasonsClient $awayStatusReasons;

    /**
     * @var ExportClient $export
     */
    public ExportClient $export;

    /**
     * @var DataExportClient $dataExport
     */
    public DataExportClient $dataExport;

    /**
     * @var HelpCentersClient $helpCenters
     */
    public HelpCentersClient $helpCenters;

    /**
     * @var InternalArticlesClient $internalArticles
     */
    public InternalArticlesClient $internalArticles;

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
     * @var CustomChannelEventsClient $customChannelEvents
     */
    public CustomChannelEventsClient $customChannelEvents;

    /**
     * @var CustomObjectInstancesClient $customObjectInstances
     */
    public CustomObjectInstancesClient $customObjectInstances;

    /**
     * @var DataAttributesClient $dataAttributes
     */
    public DataAttributesClient $dataAttributes;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var JobsClient $jobs
     */
    public JobsClient $jobs;

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
     * @var CallsClient $calls
     */
    public CallsClient $calls;

    /**
     * @var TeamsClient $teams
     */
    public TeamsClient $teams;

    /**
     * @var TicketStatesClient $ticketStates
     */
    public TicketStatesClient $ticketStates;

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
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
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
            'X-Fern-SDK-Version' => '6.0.0',
            'User-Agent' => 'intercom/intercom-php/6.0.0',
            'Intercom-Version' => '2.14',
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
        $this->aiContent = new AiContentClient($this->client, $this->options);
        $this->articles = new ArticlesClient($this->client, $this->options);
        $this->awayStatusReasons = new AwayStatusReasonsClient($this->client, $this->options);
        $this->export = new ExportClient($this->client, $this->options);
        $this->dataExport = new DataExportClient($this->client, $this->options);
        $this->helpCenters = new HelpCentersClient($this->client, $this->options);
        $this->internalArticles = new InternalArticlesClient($this->client, $this->options);
        $this->companies = new CompaniesClient($this->client, $this->options);
        $this->contacts = new ContactsClient($this->client, $this->options);
        $this->notes = new NotesClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->customChannelEvents = new CustomChannelEventsClient($this->client, $this->options);
        $this->customObjectInstances = new CustomObjectInstancesClient($this->client, $this->options);
        $this->dataAttributes = new DataAttributesClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->jobs = new JobsClient($this->client, $this->options);
        $this->messages = new MessagesClient($this->client, $this->options);
        $this->segments = new SegmentsClient($this->client, $this->options);
        $this->subscriptionTypes = new SubscriptionTypesClient($this->client, $this->options);
        $this->phoneCallRedirects = new PhoneCallRedirectsClient($this->client, $this->options);
        $this->calls = new CallsClient($this->client, $this->options);
        $this->teams = new TeamsClient($this->client, $this->options);
        $this->ticketStates = new TicketStatesClient($this->client, $this->options);
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
