<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Contributors;
use \PHPUnit\Framework\MockObject\MockObject;

final class ContributorsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedContributors;

    protected function setUp()
    {
        $this->mockedContributors = $this
            ->getMockBuilder(Contributors::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedContributors->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedContributors->method('requestAll')->willReturnCallback(
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
        $this->mockedContributors = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedContributors);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedContributors);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedContributors->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'contributors',
            ],
            $this->mockedContributors->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedContributors->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $contributorId = '{Contributor_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedContributors->retrieve($projectId, $contributorId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $contributorId = '{Contributor_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedContributors->update($projectId, $contributorId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $contributorId = '{Contributor_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedContributors->delete($projectId, $contributorId)
        );
    }
}
