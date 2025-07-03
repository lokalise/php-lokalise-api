<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\Files;
use PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class FilesTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Files */
    protected $mockedFiles;

    protected function setUp(): void
    {
        $this->mockedFiles = $this->createEndpointMock(Files::class);
    }

    protected function tearDown(): void
    {
        $this->mockedFiles = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedFiles);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedFiles);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/files",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedFiles->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/files",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'files',
            ],
            $this->mockedFiles->fetchAll($projectId)->getContent()
        );
    }

    public function testUpload(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any'], 'queue' => true];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/files/upload",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedFiles->upload($projectId, $body)->getContent()
        );
    }

    public function testDownload(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/files/download",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedFiles->download($projectId, $body)->getContent()
        );
    }

    public function testAsyncDownload(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/files/async-download",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedFiles->asyncDownload($projectId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $fileId = '{File_Id}';

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/files/$fileId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedFiles->delete($projectId, $fileId)->getContent()
        );
    }
