<?php

namespace Intercom\Test;

use Intercom\IntercomDataAttribute;

class IntercomDataAttributeTest extends TestCase
{
    public function testDataAttributeCreate()
    {
        $this->client->method('post')->willReturn('foo');

        $dataAttributes = new IntercomDataAttribute($this->client);
        $this->assertSame('foo', $dataAttributes->create([]));
    }

    public function testDataAttributeUpdate()
    {
        $this->client->method('put')->willReturn('foo');

        $dataAttribute = new IntercomDataAttribute($this->client);
        $this->assertSame('foo', $dataAttribute->update('', []));
    }

    public function testDataAttributesGet()
    {
        $this->client->method('get')->willReturn('foo');

        $dataAttributes = new IntercomDataAttribute($this->client);
        $this->assertSame('foo', $dataAttributes->getDataAttributes([]));
    }

    public function testDataAttributesGetPath()
    {
        $dataAttributes = new IntercomDataAttribute($this->client);
        $this->assertSame('data_attributes/1', $dataAttributes->dataAttributePath('1'));
    }
}
