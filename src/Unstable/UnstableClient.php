<?php

namespace Intercom\Unstable;

use Intercom\Unstable\Admins\AdminsClient;
use Intercom\Unstable\AiContent\AiContentClient;
use Intercom\Unstable\Articles\ArticlesClient;
use Intercom\Unstable\AwayStatusReasons\AwayStatusReasonsClient;
use Intercom\Unstable\Export\ExportClient;
use Intercom\Unstable\HelpCenter\HelpCenterClient;
use Intercom\Unstable\InternalArticles\InternalArticlesClient;
use Intercom\Unstable\Companies\CompaniesClient;
use Intercom\Unstable\Notes\NotesClient;
use Intercom\Unstable\Contacts\ContactsClient;
use Intercom\Unstable\SubscriptionTypes\SubscriptionTypesClient;
use Intercom\Unstable\Tags\TagsClient;
use Intercom\Unstable\Conversations\ConversationsClient;
use Intercom\Unstable\CustomChannelEvents\CustomChannelEventsClient;
use Intercom\Unstable\CustomObjectInstances\CustomObjectInstancesClient;
use Intercom\Unstable\DataAttributes\DataAttributesClient;
use Intercom\Unstable\DataEvents\DataEventsClient;
use Intercom\Unstable\DataExport\DataExportClient;
use Intercom\Unstable\Jobs\JobsClient;
use Intercom\Unstable\Macros\MacrosClient;
use Intercom\Unstable\Messages\MessagesClient;
use Intercom\Unstable\News\NewsClient;
use Intercom\Unstable\Segments\SegmentsClient;
use Intercom\Unstable\Switch_\SwitchClient;
use Intercom\Unstable\Calls\CallsClient;
use Intercom\Unstable\Teams\TeamsClient;
use Intercom\Unstable\TicketStates\TicketStatesClient;
use Intercom\Unstable\TicketTypeAttributes\TicketTypeAttributesClient;
use Intercom\Unstable\TicketTypes\TicketTypesClient;
use Intercom\Unstable\Tickets\TicketsClient;
use Intercom\Unstable\Visitors\VisitorsClient;
use Intercom\Unstable\Brands\BrandsClient;
use Intercom\Unstable\Emails\EmailsClient;
use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;

class UnstableClient
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
     * @var HelpCenterClient $helpCenter
     */
    public HelpCenterClient $helpCenter;

    /**
     * @var InternalArticlesClient $internalArticles
     */
    public InternalArticlesClient $internalArticles;

    /**
     * @var CompaniesClient $companies
     */
    public CompaniesClient $companies;

    /**
     * @var NotesClient $notes
     */
    public NotesClient $notes;

    /**
     * @var ContactsClient $contacts
     */
    public ContactsClient $contacts;

    /**
     * @var SubscriptionTypesClient $subscriptionTypes
     */
    public SubscriptionTypesClient $subscriptionTypes;

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
     * @var DataEventsClient $dataEvents
     */
    public DataEventsClient $dataEvents;

    /**
     * @var DataExportClient $dataExport
     */
    public DataExportClient $dataExport;

    /**
     * @var JobsClient $jobs
     */
    public JobsClient $jobs;

    /**
     * @var MacrosClient $macros
     */
    public MacrosClient $macros;

    /**
     * @var MessagesClient $messages
     */
    public MessagesClient $messages;

    /**
     * @var NewsClient $news
     */
    public NewsClient $news;

    /**
     * @var SegmentsClient $segments
     */
    public SegmentsClient $segments;

    /**
     * @var SwitchClient $switch_
     */
    public SwitchClient $switch_;

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
     * @var TicketTypeAttributesClient $ticketTypeAttributes
     */
    public TicketTypeAttributesClient $ticketTypeAttributes;

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
     * @var BrandsClient $brands
     */
    public BrandsClient $brands;

    /**
     * @var EmailsClient $emails
     */
    public EmailsClient $emails;

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
        $this->admins = new AdminsClient($this->client, $this->options);
        $this->aiContent = new AiContentClient($this->client, $this->options);
        $this->articles = new ArticlesClient($this->client, $this->options);
        $this->awayStatusReasons = new AwayStatusReasonsClient($this->client, $this->options);
        $this->export = new ExportClient($this->client, $this->options);
        $this->helpCenter = new HelpCenterClient($this->client, $this->options);
        $this->internalArticles = new InternalArticlesClient($this->client, $this->options);
        $this->companies = new CompaniesClient($this->client, $this->options);
        $this->notes = new NotesClient($this->client, $this->options);
        $this->contacts = new ContactsClient($this->client, $this->options);
        $this->subscriptionTypes = new SubscriptionTypesClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->customChannelEvents = new CustomChannelEventsClient($this->client, $this->options);
        $this->customObjectInstances = new CustomObjectInstancesClient($this->client, $this->options);
        $this->dataAttributes = new DataAttributesClient($this->client, $this->options);
        $this->dataEvents = new DataEventsClient($this->client, $this->options);
        $this->dataExport = new DataExportClient($this->client, $this->options);
        $this->jobs = new JobsClient($this->client, $this->options);
        $this->macros = new MacrosClient($this->client, $this->options);
        $this->messages = new MessagesClient($this->client, $this->options);
        $this->news = new NewsClient($this->client, $this->options);
        $this->segments = new SegmentsClient($this->client, $this->options);
        $this->switch_ = new SwitchClient($this->client, $this->options);
        $this->calls = new CallsClient($this->client, $this->options);
        $this->teams = new TeamsClient($this->client, $this->options);
        $this->ticketStates = new TicketStatesClient($this->client, $this->options);
        $this->ticketTypeAttributes = new TicketTypeAttributesClient($this->client, $this->options);
        $this->ticketTypes = new TicketTypesClient($this->client, $this->options);
        $this->tickets = new TicketsClient($this->client, $this->options);
        $this->visitors = new VisitorsClient($this->client, $this->options);
        $this->brands = new BrandsClient($this->client, $this->options);
        $this->emails = new EmailsClient($this->client, $this->options);
    }
}
