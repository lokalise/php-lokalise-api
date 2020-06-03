<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Webhooks;
use \PHPUnit\Framework\MockObject\MockObject;

final class WebhooksTest extends TestCase
{

    /** @var MockObject */
    protected $mockedWebhooks;

    protected function setUp()
    {
        $this->mockedWebhooks = $this
            ->getMockBuilder(Webhooks::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedWebhooks->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedWebhooks->method('requestAll')->willReturnCallback(
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
        $this->mockedWebhooks = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedWebhooks);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedWebhooks);
    }

    public function testList()
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedWebhooks->list($projectId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $projectId = '{Project_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'webhooks',
            ],
            $this->mockedWebhooks->fetchAll($projectId)
        );
    }

    public function testCreate()
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedWebhooks->create($projectId, $body)
        );
    }

    public function testRetrieve()
    {
        $projectId = '{Project_Id}';
        $webhookId = '{Webhook_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->retrieve($projectId, $webhookId)
        );
    }

    public function testUpdate()
    {
        $projectId = '{Project_Id}';
        $webhookId = '{Webhook_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedWebhooks->update($projectId, $webhookId, $body)
        );
    }

    public function testDelete()
    {
        $projectId = '{Project_Id}';
        $webhookId = '{Webhook_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->delete($projectId, $webhookId)
        );
    }

    public function testRegenerateSecret()
    {
        $projectId = '{Project_Id}';
        $webhookId = '{Webhook_Id}';

        $this->assertEquals(
            [
                'requestType' => 'PATCH',
                'uri' => "projects/$projectId/webhooks/$webhookId/secret/regenerate",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->regenerateSecret($projectId, $webhookId)
        );
    }
}
