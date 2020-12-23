<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use Lokalise\Endpoints\EndpointInterface;
use Lokalise\Endpoints\Endpoint;
use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Comments;
use \PHPUnit\Framework\MockObject\MockObject;

final class CommentsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Comments */
    private $mockedComments;

    protected function setUp(): void
    {
        $this->mockedComments = $this->createEndpointMock(Comments::class);
    }

    protected function tearDown(): void
    {
        $this->mockedComments = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedComments);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedComments);
    }

    public function testListProject(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/comments",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedComments->listProject($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAllProject(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/comments",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'comments',
            ],
            $this->mockedComments->fetchAllProject($projectId)->getContent()
        );
    }

    public function testListKey(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedComments->listKey($projectId, $keyId, $getParameters)->getContent()
        );
    }

    public function testFetchAllKey(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'comments',
            ],
            $this->mockedComments->fetchAllKey($projectId, $keyId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/keys/$keyId/comments",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedComments->create($projectId, $keyId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;
        $commentId = 456;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/keys/$keyId/comments/$commentId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedComments->retrieve($projectId, $keyId, $commentId)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $keyId = 123;
        $commentId = 456;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/keys/$keyId/comments/$commentId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedComments->delete($projectId, $keyId, $commentId)->getContent()
        );
    }
}
