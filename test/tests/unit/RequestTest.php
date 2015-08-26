<?php

use Alexa\Request\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testLaunchRequest()
    {
    	$data = json_decode(file_get_contents(__DIR__ . '/stubs/launch-request.json'), true);
        $request = Request::fromData($data);

        $this->assertInstanceOf(Alexa\Request\LaunchRequest::class, $request);
        $this->assertEquals(new DateTime('2015-05-13 12:34:56Z'), $request->timestamp);
    }
}
