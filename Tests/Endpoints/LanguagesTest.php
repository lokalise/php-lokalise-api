<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Languages;
use \PHPUnit\Framework\MockObject\MockObject;

final class LanguagesTest extends TestCase
{

    /** @var MockObject */
    protected $mockedLanguages;

    protected function setUp()
    {
        $this->mockedLanguages = $this
            ->getMockBuilder(Languages::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedLanguages->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedLanguages->method('requestAll')->willReturnCallback(
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
        $this->mockedLanguages = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedLanguages);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedLanguages);
    }

    public function testListSystem()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "system/languages",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedLanguages->listSystem($getParameters)
        );
    }

    public function testFetchAllSystem()
    {
        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "system/languages",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'languages',
            ],
            $this->mockedLanguages->fetchAllSystem()
        );
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedLanguages->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'languages',
            ],
            $this->mockedLanguages->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/languages",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedLanguages->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $languageId = '{Language_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedLanguages->retrieve($projectId, $languageId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $languageId = '{Language_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedLanguages->update($projectId, $languageId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $languageId = '{Languages_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedLanguages->delete($projectId, $languageId)
        );
    }
}
