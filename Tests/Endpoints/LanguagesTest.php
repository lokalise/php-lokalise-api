<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Languages;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class LanguagesTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Languages */
    private $mockedLanguages;

    protected function setUp(): void
    {
        $this->mockedLanguages = $this->createEndpointMock(Languages::class);
    }

    protected function tearDown(): void
    {
        $this->mockedLanguages = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedLanguages);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedLanguages);
    }

    public function testListSystem(): void
    {
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "system/languages",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedLanguages->listSystem($getParameters)->getContent()
        );
    }

    public function testFetchAllSystem(): void
    {
        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "system/languages",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'languages',
            ],
            $this->mockedLanguages->fetchAllSystem()->getContent()
        );
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedLanguages->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'languages',
            ],
            $this->mockedLanguages->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/languages",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedLanguages->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $languageId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedLanguages->retrieve($projectId, $languageId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $languageId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedLanguages->update($projectId, $languageId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $languageId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/languages/$languageId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedLanguages->delete($projectId, $languageId)->getContent()
        );
    }
}
