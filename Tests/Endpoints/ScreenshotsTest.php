<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Screenshots;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class ScreenshotsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Screenshots */
    private $mockedScreenshots;

    protected function setUp(): void
    {
        $this->mockedScreenshots = $this->createEndpointMock(Screenshots::class);
    }

    protected function tearDown(): void
    {
        $this->mockedScreenshots = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedScreenshots);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedScreenshots);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedScreenshots->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'screenshots',
            ],
            $this->mockedScreenshots->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/screenshots",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedScreenshots->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $screenshotId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedScreenshots->retrieve($projectId, $screenshotId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $screenshotId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedScreenshots->update($projectId, $screenshotId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $screenshotId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/screenshots/$screenshotId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedScreenshots->delete($projectId, $screenshotId)->getContent()
        );
    }
}
