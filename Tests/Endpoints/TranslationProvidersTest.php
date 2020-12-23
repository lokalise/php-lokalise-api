<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\MockObject\MockObject;
use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\TranslationProviders;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TranslationProvidersTest extends TestCase
{
    use MockEndpointTrait;

    /** @var TranslationProviders|MockObject */
    private $mockedProviders;

    protected function setUp(): void
    {
        $this->mockedProviders = $this->createEndpointMock(TranslationProviders::class);
    }

    protected function tearDown(): void
    {
        $this->mockedProviders = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedProviders);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedProviders);
    }

    public function testList(): void
    {
        $getParameters = ['params' => ['any']];

        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/translation_providers",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProviders->list($teamId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/translation_providers",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'translation_providers',
            ],
            $this->mockedProviders->fetchAll($teamId)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $teamId = 123;
        $providerId = 456;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/translation_providers/$providerId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProviders->retrieve($teamId, $providerId)->getContent()
        );
    }
}
