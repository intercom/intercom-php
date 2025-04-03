<?php

namespace Intercom\Test;

use Intercom\IntercomMessages;

class IntercomMessagesTest extends TestCase
{
    public function testMessageCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $messages = new IntercomMessages($this->client);
        $this->assertSame('foo', $messages->create([]));
    }

    public function testCreateExport()
    {
        $this->client->method('post')->willReturn('foo');

        $messages = new IntercomMessages($this->client);
        $this->assertSame('foo', $messages->createExport([
            'created_at_after' => 1234567890,
            'created_at_before' => 1234567891
        ]));
    }

    public function testRetrieveExportStatus()
    {
        $this->client->method('get')->willReturn('foo');

        $messages = new IntercomMessages($this->client);
        $this->assertSame('foo', $messages->retrieveExportStatus('job123'));
    }

    public function testRetrieveExportData()
    {
        $this->client->method('get')->willReturn('foo');

        $messages = new IntercomMessages($this->client);
        $this->assertSame('foo', $messages->retrieveExportData('job123'));
    }
}
