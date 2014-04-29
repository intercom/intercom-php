<?php
namespace Intercom\Util;

use Guzzle\Tests\GuzzleTestCase;

class FlatStoreTest extends GuzzleTestCase
{
    /** @var array */
    private $unkeyed_data = ['Help', 1234];
    /** @var array */
    private $valid_data = ['key1' => 'value1', 'key2' => false, 'key3' => 0.85353];
    /** @var array */
    private $invalid_data = ['key1' => 'Arg1', 'key2' => ['Arg2']];

    public function testConstructFlatStoreNoArgs()
    {
        $fs = new FlatStore();
        $this->assertInstanceOf('Intercom\Util\Flatstore', $fs);
    }

    public function testEmptyFlatStore()
    {
        $fs = new FlatStore();
        $this->assertEmpty($fs->getStore());
    }

    public function testConstructFlatStoreWithData()
    {
        $fs = new FlatStore($this->valid_data);
        $this->assertEquals($this->valid_data, $fs->getStore());
    }

    public function testGetStore()
    {
        $fs = new FlatStore($this->valid_data);
        $this->assertTrue(is_array($fs->getStore()));
        $this->assertEquals($this->valid_data, $fs->getStore());
    }

    public function testArrayAccess()
    {
        $fs = new FlatStore($this->valid_data);
        $this->assertEquals($this->valid_data['key1'], $fs['key1']);
    }

    public function testArrayAccessSetter()
    {
        $fs = new FlatStore();
        $fs['key1'] = 'test';
        $this->assertEquals('test', $fs['key1']);
    }

    public function testArrayAccessInvalidKey()
    {
        $fs = new FlatStore($this->valid_data);
        $this->assertNull($this->valid_data['key4']);
    }

    public function testArrayAccessUnset()
    {
        $fs = new FlatStore($this->valid_data);
        unset($fs['key1']);
        $this->assertEquals(array_slice($this->valid_data, 1), $fs->getStore());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructFlatStoreWithInvalidData()
    {
        $fs = new FlatStore($this->invalid_data);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructFlatStoreWithUnkeyedData()
    {
        $fs = new FlatStore($this->unkeyed_data);
    }
}