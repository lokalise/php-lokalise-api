<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Translations;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TranslationsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var Translations|MockObject */
    private $mockedTranslations;

    protected function setUp(): void
    {
        $this->mockedTranslations = $this->createEndpointMock(Translations::class);
    }

    protected function tearDown(): void
    {
        $this->mockedTranslations = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedTranslations);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedTranslations);
    }

    public function testList(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTranslations->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'translations',
            ],
            $this->mockedTranslations->fetchAll($projectId)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $translationId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/translations/$translationId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTranslations->retrieve($projectId, $translationId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $translationId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/translations/$translationId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTranslations->update($projectId, $translationId, $body)->getContent()
        );
    }
}
