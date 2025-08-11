<?php

namespace Intercom\News;

use Intercom\News\Items\ItemsClient;
use Intercom\News\Feeds\FeedsClient;
use GuzzleHttp\ClientInterface;
use Intercom\Core\Client\RawClient;

class NewsClient
{
    /**
     * @var ItemsClient $items
     */
    public ItemsClient $items;

    /**
     * @var FeedsClient $feeds
     */
    public FeedsClient $feeds;

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
        $this->items = new ItemsClient($this->client, $this->options);
        $this->feeds = new FeedsClient($this->client, $this->options);
    }
}
