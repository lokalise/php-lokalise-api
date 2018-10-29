<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Comments;
use \PHPUnit\Framework\MockObject\MockObject;

final class CommentsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedComments;

    protected function setUp()
    {
        $this->mockedComments = $this
            ->getMockBuilder(Comments::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedComments->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedComments->method('requestAll')->willReturnCallback(
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
        $this->mockedComments = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedComments);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedComments);
    }

    public function testListProject()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/comments",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedComments->listProject($projectId, $getParameters)
        );
    }

    public function testFetchAllProject()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/comments",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'comments',
            ],
            $this->mockedComments->fetchAllProject($projectId)
        );
    }

    public function testListKey()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedComments->listKey($projectId, $keyId, $getParameters)
        );
    }

    public function testFetchAllKey()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'comments',
            ],
            $this->mockedComments->fetchAllKey($projectId, $keyId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedComments->create($projectId, $keyId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';
        $commentId = '{Comment_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments/$commentId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedComments->retrieve($projectId, $keyId, $commentId)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';
        $commentId = '{Comment_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys/$keyId/comments/$commentId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedComments->delete($projectId, $keyId, $commentId)
        );
    }
}
