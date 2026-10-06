<?php

namespace Intercom\Tests\Legacy;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Intercom\Legacy\IntercomClient;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class IntercomResourcePathTest extends TestCase
{
    private IntercomClient $client;
    private MockHandler $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $httpClient = new Client(['handler' => HandlerStack::create($this->mockHandler)]);

        $this->client = new IntercomClient('test_token');
        $this->client->setHttpClient($httpClient);
    }

    public function testEncodesIdInPath(): void
    {
        $this->mockHandler->append(new Response(200, [], json_encode([])));

        $this->client->contacts->getContact('a/b?c#d');

        $uri = $this->mockHandler->getLastRequest()->getUri();
        $this->assertSame('/contacts/a%2Fb%3Fc%23d', $uri->getPath());
        $this->assertSame('', $uri->getQuery());
        $this->assertSame('', $uri->getFragment());
    }

    public function testEncodesEveryIdInCompanyDetachPath(): void
    {
        $this->assertSame(
            'contacts/a%2Fb/companies/c%3Fd',
            $this->client->companies->companyDetachPath('a/b', 'c?d')
        );
    }

    public function testKeepsPlainIdUnchanged(): void
    {
        $this->assertSame('users/abc123', $this->client->users->userPath('abc123'));
    }

    /**
     * @dataProvider invalidIdProvider
     */
    public function testRejectsDotSegmentId(string $id): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->client->contacts->getContact($id);
    }

    public function invalidIdProvider(): array
    {
        return [[''], ['.'], ['..']];
    }
}
