<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\Teams;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TeamsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Teams */
    private $mockedTeams;

    protected function setUp(): void
    {
        $this->mockedTeams = $this->createEndpointMock(Teams::class);
    }

    protected function tearDown(): void
    {
        $this->mockedTeams = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedTeams);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedTeams);
    }

    public function testList(): void
    {
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeams->list($getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'teams',
            ],
            $this->mockedTeams->fetchAll()->getContent()
        );
    }
}
