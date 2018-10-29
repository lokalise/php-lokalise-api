<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Teams;
use \PHPUnit\Framework\MockObject\MockObject;

final class TeamsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedTeams;

    protected function setUp()
    {
        $this->mockedTeams = $this
            ->getMockBuilder(Teams::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedTeams->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedTeams->method('requestAll')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = [], $bodyResponseKey = '') {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                    'bodyResponseKey' => $bodyResponseKey,
                ];
            }
        );
    }

    protected function tearDown()
    {
        $this->mockedTeams = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedTeams);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedTeams);
    }

    public function testList()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeams->list($getParameters)
        );
    }

    public function testFetchAll()
    {
        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'teams',
            ],
            $this->mockedTeams->fetchAll()
        );
    }
}
