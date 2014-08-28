<?php

namespace Intercom;

use Guzzle\Tests\GuzzleTestCase;

class IntercomTestCase extends GuzzleTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = IntercomBasicAuthClient::factory([
            'api_key' => '1234',
            'app_id' => 'my-app'
        ]);
    }

}

?>
