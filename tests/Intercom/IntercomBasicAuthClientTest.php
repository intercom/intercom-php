<?php
namespace Intercom;

use Guzzle\Tests\GuzzleTestCase;

class IntercomBasicAuthClientTest extends GuzzleTestCase
{
    private $config = [
        'api_key' => '1234',
        'app_id' => 'my-app'
    ];

    public function testFactory()
    {
        $client = IntercomBasicAuthClient::factory($this->config);
        $this->assertInstanceOf('Intercom\IntercomBasicAuthClient', $client);
    }

    public function testConstructor()
    {
        $client = new IntercomBasicAuthClient($this->config);
        $this->assertInstanceOf('Intercom\IntercomBasicAuthClient', $client);
    }

    public function testAuthIsSet()
    {
        $client = IntercomBasicAuthClient::factory($this->config);
        $auth = $client->getDefaultOption('auth');

        $this->assertEquals(3, count($auth));
        $this->assertEquals($this->config['app_id'], $auth[0]);
        $this->assertEquals($this->config['api_key'], $auth[1]);
        $this->assertEquals('Basic', $auth[2]);
    }

    function testGetServiceDescriptionFromFile()
    {
        $client = new IntercomBasicAuthClient($this->config);
        $sd = $client->getServiceDescriptionFromFile(__DIR__ . '/../../src/Intercom/Service/config/intercom.json');
        $this->assertInstanceOf('Guzzle\Service\Description\ServiceDescription', $sd);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    function testGetServiceDescriptionFromFileNoFile()
    {
        $client = new IntercomBasicAuthClient($this->config);
        $client->getServiceDescriptionFromFile('');

    }

    /**
     * @expectedException \Guzzle\Common\Exception\InvalidArgumentException
     */
    public function testFactoryEmptyArgs()
    {
        IntercomBasicAuthClient::factory([]);
    }

    /**
     * @expectedException \Guzzle\Common\Exception\InvalidArgumentException
     */
    public function testFactoryMissingArgs()
    {
        IntercomBasicAuthClient::factory(['app_id' => 'my-app']);
    }
}