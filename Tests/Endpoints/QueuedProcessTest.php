<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\QueuedProcesses;
use PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class QueuedProcessTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|QueuedProcesses */
    private $mockedProcesses;

    protected function setUp(): void
    {
        $this->mockedProcesses = $this->createEndpointMock(QueuedProcesses::class);
    }

    protected function tearDown(): void
    {
        $this->mockedProcesses = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedProcesses);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedProcesses);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/processes",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProcesses->list($projectId, $getParameters)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $processId = '{Screenshot_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/processes/$processId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProcesses->retrieve($projectId, $processId)->getContent()
        );
    }
}
