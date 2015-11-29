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
        $this->assertEquals('amzn1.echo-sdk-ams.app.000000-d0ed-0000-ad00-000000d00ebe', $request->applicationId);

        $this->assertEquals('amzn1.account.AM3B00000000000000000000000', $request->user->userId);
        $this->assertNull($request->user->accessToken);
    }
}
