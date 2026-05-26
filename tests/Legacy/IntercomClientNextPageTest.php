<?php

namespace Intercom\Tests\Legacy;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Intercom\Legacy\IntercomClient;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;

class IntercomClientNextPageTest extends TestCase
{
    private IntercomClient $client;
    private MockHandler $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $handlerStack = HandlerStack::create($this->mockHandler);
        $httpClient = new Client(['handler' => $handlerStack]);

        $this->client = new IntercomClient('test_token');
        $this->client->setHttpClient($httpClient);
    }

    // Happy path — legitimate https://api.intercom.io URL must be followed with credentials attached.
    public function testNextPageFollowsLegitimateUrl(): void
    {
        $this->mockHandler->append(new Response(200, [], json_encode(['data' => []])));

        $pages = new stdClass();
        $pages->next = 'https://api.intercom.io/contacts?page=2&per_page=50';

        $result = $this->client->nextPage($pages);

        $this->assertIsObject($result);
        $lastRequest = $this->mockHandler->getLastRequest();
        $this->assertNotNull($lastRequest);
        $this->assertEquals(
            'https://api.intercom.io/contacts?page=2&per_page=50',
            (string) $lastRequest->getUri()
        );
        $this->assertStringStartsWith('Bearer ', $lastRequest->getHeaderLine('Authorization'));
    }

    // Vulnerability closed — attacker-controlled host must be rejected before any HTTP call.
    // If the guard were absent MockHandler would throw OutOfBoundsException (no queued response),
    // so receiving InvalidArgumentException proves the check fires first.
    public function testNextPageRejectsAttackerControlledHost(): void
    {
        $pages = new stdClass();
        $pages->next = 'https://attacker.com/steal';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }

    // SSRF vector — AWS instance metadata endpoint must be rejected.
    public function testNextPageRejectsAwsMetadataServiceUrl(): void
    {
        $pages = new stdClass();
        $pages->next = 'http://169.254.169.254/latest/meta-data/iam/security-credentials/';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }

    // Scheme enforcement — http:// to the correct host must still be rejected (no downgrade).
    public function testNextPageRejectsPlainHttpEvenForApiIntercomIo(): void
    {
        $pages = new stdClass();
        $pages->next = 'http://api.intercom.io/contacts?page=2';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }

    // Subdomain bypass attempt — evil.api.intercom.io must not match.
    public function testNextPageRejectsSubdomainOfApiIntercomIo(): void
    {
        $pages = new stdClass();
        $pages->next = 'https://evil.api.intercom.io/contacts?page=2';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }

    // EU region — setBaseUrl() to EU endpoint allows EU pagination URLs.
    public function testNextPageAllowsEuUrlWhenBaseUrlIsEu(): void
    {
        $this->client->setBaseUrl('https://api.eu.intercom.io');
        $this->mockHandler->append(new Response(200, [], json_encode(['data' => []])));

        $pages = new stdClass();
        $pages->next = 'https://api.eu.intercom.io/contacts?page=2&per_page=50';

        $result = $this->client->nextPage($pages);

        $this->assertIsObject($result);
        $lastRequest = $this->mockHandler->getLastRequest();
        $this->assertNotNull($lastRequest);
        $this->assertEquals(
            'https://api.eu.intercom.io/contacts?page=2&per_page=50',
            (string) $lastRequest->getUri()
        );
    }

    // AU region — setBaseUrl() to AU endpoint allows AU pagination URLs.
    public function testNextPageAllowsAuUrlWhenBaseUrlIsAu(): void
    {
        $this->client->setBaseUrl('https://api.au.intercom.io');
        $this->mockHandler->append(new Response(200, [], json_encode(['data' => []])));

        $pages = new stdClass();
        $pages->next = 'https://api.au.intercom.io/contacts?page=2&per_page=50';

        $result = $this->client->nextPage($pages);

        $this->assertIsObject($result);
    }

    // Regional mismatch — EU base URL must reject US pagination URL (and vice versa).
    public function testNextPageRejectsUsMismatchWhenBaseUrlIsEu(): void
    {
        $this->client->setBaseUrl('https://api.eu.intercom.io');

        $pages = new stdClass();
        $pages->next = 'https://api.intercom.io/contacts?page=2';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }

    // SSRF still blocked even when a regional baseUrl is configured.
    public function testNextPageRejectsAttackerHostEvenWithRegionalBaseUrl(): void
    {
        $this->client->setBaseUrl('https://api.eu.intercom.io');

        $pages = new stdClass();
        $pages->next = 'https://attacker.com/steal';

        $this->expectException(InvalidArgumentException::class);
        $this->client->nextPage($pages);
    }
}
