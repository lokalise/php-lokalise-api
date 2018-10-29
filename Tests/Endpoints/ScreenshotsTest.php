<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Screenshots;
use \PHPUnit\Framework\MockObject\MockObject;

final class ScreenshotsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedScreenshots;

    protected function setUp()
    {
        $this->mockedScreenshots = $this
            ->getMockBuilder(Screenshots::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedScreenshots->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedScreenshots->method('requestAll')->willReturnCallback(
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
        $this->mockedScreenshots = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedScreenshots);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedScreenshots);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedScreenshots->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'screenshots',
            ],
            $this->mockedScreenshots->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedScreenshots->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $screenshotId = '{Screenshot_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedScreenshots->retrieve($projectId, $screenshotId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $screenshotId = '{Screenshot_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedScreenshots->update($projectId, $screenshotId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $screenshotId = '{Screenshot_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedScreenshots->delete($projectId, $screenshotId)
        );
    }
}
