<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\QueuedProcesses;
use \PHPUnit\Framework\MockObject\MockObject;

final class QueuedProcessTest extends TestCase
{

    /** @var MockObject */
    protected $mockedProcesses;

    protected function setUp()
    {
        $this->mockedProcesses = $this
            ->getMockBuilder(QueuedProcesses::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request'])
            ->getMock();

        $this->mockedProcesses->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );
    }

    protected function tearDown()
    {
        $this->mockedProcesses = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedProcesses);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedProcesses);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/processes",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProcesses->list($projectId, $getParameters)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $processId = '{Screenshot_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/processes/$processId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProcesses->retrieve($projectId, $processId)
        );
    }
}
