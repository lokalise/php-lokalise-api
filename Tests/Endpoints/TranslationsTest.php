<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Translations;
use \PHPUnit\Framework\MockObject\MockObject;

final class TranslationsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedTranslations;

    protected function setUp()
    {
        $this->mockedTranslations = $this
            ->getMockBuilder(Translations::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedTranslations->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedTranslations->method('requestAll')->willReturnCallback(
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
        $this->mockedTranslations = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedTranslations);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedTranslations);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTranslations->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'translations',
            ],
            $this->mockedTranslations->fetchAll($projectId)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $translationId = '{Translation_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations/$translationId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTranslations->retrieve($projectId, $translationId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $translationId = '{Translation_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/translations/$translationId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTranslations->update($projectId, $translationId, $body)
        );
    }
}
