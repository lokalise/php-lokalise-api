<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use Lokalise\Endpoints\CustomTranslationStatuses;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class CustomTranslationStatusesTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|CustomTranslationStatuses */
    private $mockedCustomTranslationStatuses;

    protected function setUp(): void
    {
        $this->mockedCustomTranslationStatuses = $this->createEndpointMock(CustomTranslationStatuses::class);
    }

    protected function tearDown(): void
    {
        $this->mockedCustomTranslationStatuses = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedCustomTranslationStatuses);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedCustomTranslationStatuses);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'custom_translation_statuses',
            ],
            $this->mockedCustomTranslationStatuses->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/custom-translation-statuses",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCustomTranslationStatuses->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $statusId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->retrieve($projectId, $statusId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $statusId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCustomTranslationStatuses->update($projectId, $statusId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $statusId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/custom-translation-statuses/$statusId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCustomTranslationStatuses->delete($projectId, $statusId)->getContent()
        );
    }
}
