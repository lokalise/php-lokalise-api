<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Keys;
use \PHPUnit\Framework\MockObject\MockObject;

final class KeysTest extends TestCase
{

    /** @var MockObject */
    protected $mockedKeys;

    protected function setUp()
    {
        $this->mockedKeys = $this
            ->getMockBuilder(Keys::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedKeys->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedKeys->method('requestAll')->willReturnCallback(
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
        $this->mockedKeys = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedKeys);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedKeys);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedKeys->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'keys',
            ],
            $this->mockedKeys->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedKeys->retrieve($projectId, $keyId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->update($projectId, $keyId, $body)
        );
    }

    public function testBulkUpdate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->bulkUpdate($projectId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $keyId = '{Key_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedKeys->delete($projectId, $keyId)
        );
    }

    public function testBulkDelete()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->bulkDelete($projectId, $body)
        );
    }
}
