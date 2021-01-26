<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Projects;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class ProjectsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Projects */
    private $mockedProjects;

    protected function setUp(): void
    {
        $this->mockedProjects = $this->createEndpointMock(Projects::class);
    }

    protected function tearDown(): void
    {
        $this->mockedProjects = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedProjects);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedProjects);
    }

    public function testList(): void
    {
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProjects->list($getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects",
                'queryParams' => $getParameters,
                'body' => [],
                'bodyResponseKey' => 'projects',
            ],
            $this->mockedProjects->fetchAll($getParameters)->getContent()
        );
    }

    public function testCreate(): void
    {
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedProjects->create($body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->retrieve($projectId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedProjects->update($projectId, $body)->getContent()
        );
    }

    public function testEmpty(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/empty",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->empty($projectId)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProjects->delete($projectId)->getContent()
        );
    }
}
