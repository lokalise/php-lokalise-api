<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Projects;
use \PHPUnit\Framework\MockObject\MockObject;

final class ProjectsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedProjects;

    protected function setUp()
    {
        $this->mockedProjects = $this
            ->getMockBuilder(Projects::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedProjects->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedProjects->method('requestAll')->willReturnCallback(
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
        $this->mockedProjects = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedProjects);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedProjects);
    }

    public function testList()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProjects->list($getParameters)
        );
    }

    public function testFetchAll()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects",
                'queryParams' => $getParameters,
                'body' => [],
                'bodyResponseKey' => 'projects',
            ],
            $this->mockedProjects->fetchAll($getParameters)
        );
    }

    public function testCreate()
    {
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedProjects->create($body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->retrieve($projectId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedProjects->update($projectId, $body)
        );
    }

    public function testEmpty()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/empty",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->empty($projectId)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->delete($projectId)
        );
    }
}
