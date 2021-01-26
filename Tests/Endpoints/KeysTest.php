<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Keys;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class KeysTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Keys */
    private $mockedKeys;

    protected function setUp(): void
    {
        $this->mockedKeys = $this->createEndpointMock(Keys::class);
    }

    protected function tearDown(): void
    {
        $this->mockedKeys = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedKeys);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedKeys);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedKeys->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'keys',
            ],
            $this->mockedKeys->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedKeys->retrieve($projectId, $keyId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->update($projectId, $keyId, $body)->getContent()
        );
    }

    public function testBulkUpdate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->bulkUpdate($projectId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys/$keyId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedKeys->delete($projectId, $keyId)->getContent()
        );
    }

    public function testBulkDelete(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedKeys->bulkDelete($projectId, $body)->getContent()
        );
    }
}
