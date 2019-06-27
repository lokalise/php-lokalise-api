<?php

use Lokalise\Endpoints\CustomTranslationStatuses;
use \PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\MockObject\MockObject;

final class CustomTranslationStatusesTest extends TestCase
{

    /** @var MockObject */
    protected $mockedCustomTranslationStatuses;

    protected function setUp()
    {
        $this->mockedCustomTranslationStatuses = $this
            ->getMockBuilder(CustomTranslationStatuses::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedCustomTranslationStatuses->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedCustomTranslationStatuses->method('requestAll')->willReturnCallback(
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
        $this->mockedCustomTranslationStatuses = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedCustomTranslationStatuses);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedCustomTranslationStatuses);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'custom_translation_statuses',
            ],
            $this->mockedCustomTranslationStatuses->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCustomTranslationStatuses->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $statusId = '{Status_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->retrieve($projectId, $statusId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $statusId = '{Status_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCustomTranslationStatuses->update($projectId, $statusId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $statusId = '{Status_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->delete($projectId, $statusId)
        );
    }
}
