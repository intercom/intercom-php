<?php

abstract class AbstractRequestBase extends \PHPUnit_Framework_TestCase
{
    protected $stub;

    public function setUp()
    {
        $this->stub = $this->getMockBuilder('Intercom\IntercomClient')->disableOriginalConstructor()->getMock();
    }
}
