<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Webhooks;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class WebhooksTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Webhooks */
    private $mockedWebhooks;

    protected function setUp(): void
    {
        $this->mockedWebhooks = $this->createEndpointMock(Webhooks::class);
    }

    protected function tearDown(): void
    {
        $this->mockedWebhooks = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedWebhooks);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedWebhooks);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedWebhooks->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'webhooks',
            ],
            $this->mockedWebhooks->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/webhooks",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedWebhooks->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $webhookId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->retrieve($projectId, $webhookId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $webhookId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedWebhooks->update($projectId, $webhookId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $webhookId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/webhooks/$webhookId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->delete($projectId, $webhookId)->getContent()
        );
    }

    public function testRegenerateSecret(): void
    {
        $projectId = '{Project_Id}';
        $webhookId = 123;

        self::assertEquals(
            [
                'requestType' => 'PATCH',
                'uri' => "projects/$projectId/webhooks/$webhookId/secret/regenerate",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedWebhooks->regenerateSecret($projectId, $webhookId)->getContent()
        );
    }
}
