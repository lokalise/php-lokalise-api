<?php

use Lokalise\Endpoints\AdvancedReviewStatuses;
use \PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\MockObject\MockObject;

final class AdvancedReviewStatusesTest extends TestCase
{

    /** @var MockObject */
    protected $mockedAdvancedReviewStatuses;

    protected function setUp()
    {
        $this->mockedAdvancedReviewStatuses = $this
            ->getMockBuilder(AdvancedReviewStatuses::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedAdvancedReviewStatuses->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedAdvancedReviewStatuses->method('requestAll')->willReturnCallback(
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
        $this->mockedAdvancedReviewStatuses = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedAdvancedReviewStatuses);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedAdvancedReviewStatuses);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/advanced-review-statuses",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedAdvancedReviewStatuses->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/advanced-review-statuses",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'advanced_review_statuses',
            ],
            $this->mockedAdvancedReviewStatuses->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/advanced-review-statuses",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedAdvancedReviewStatuses->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $statusId = '{Status_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/advanced-review-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedAdvancedReviewStatuses->retrieve($projectId, $statusId)
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
                'uri' => "projects/$projectId/advanced-review-statuses/$statusId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedAdvancedReviewStatuses->update($projectId, $statusId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $statusId = '{Status_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/advanced-review-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedAdvancedReviewStatuses->delete($projectId, $statusId)
        );
    }
}
