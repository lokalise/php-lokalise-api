<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Tasks;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TasksTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Tasks */
    private $mockedTasks;

    protected function setUp(): void
    {
        $this->mockedTasks = $this->createEndpointMock(Tasks::class);
    }

    protected function tearDown(): void
    {
        $this->mockedTasks = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedTasks);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedTasks);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTasks->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'tasks',
            ],
            $this->mockedTasks->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/tasks",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTasks->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $taskId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTasks->retrieve($projectId, $taskId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $taskId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTasks->update($projectId, $taskId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $taskId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/tasks/$taskId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTasks->delete($projectId, $taskId)->getContent()
        );
    }
}
