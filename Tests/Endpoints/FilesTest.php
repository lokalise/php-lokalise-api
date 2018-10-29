<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Files;
use \PHPUnit\Framework\MockObject\MockObject;

final class FilesTest extends TestCase
{

    /** @var MockObject */
    protected $mockedFiles;

    protected function setUp()
    {
        $this->mockedFiles = $this
            ->getMockBuilder(Files::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedFiles->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedFiles->method('requestAll')->willReturnCallback(
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
        $this->mockedFiles = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedFiles);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedFiles);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/files",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedFiles->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/files",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'files',
            ],
            $this->mockedFiles->fetchAll($projectId)
        );
    }

    public function testUpload()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/files/upload",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedFiles->upload($projectId, $body)
        );
    }

    public function testDownload()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/files/download",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedFiles->download($projectId, $body)
        );
    }
}
