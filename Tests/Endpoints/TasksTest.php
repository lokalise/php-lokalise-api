<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Tasks;
use \PHPUnit\Framework\MockObject\MockObject;

final class TasksTest extends TestCase
{

    /** @var MockObject */
    protected $mockedTasks;

    protected function setUp()
    {
        $this->mockedTasks = $this
            ->getMockBuilder(Tasks::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedTasks->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedTasks->method('requestAll')->willReturnCallback(
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
        $this->mockedTasks = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedTasks);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedTasks);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTasks->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'tasks',
            ],
            $this->mockedTasks->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTasks->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $taskId = '{Task_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTasks->retrieve($projectId, $taskId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $taskId = '{Task_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTasks->update($projectId, $taskId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $taskId = '{Task_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTasks->delete($projectId, $taskId)
        );
    }
}
