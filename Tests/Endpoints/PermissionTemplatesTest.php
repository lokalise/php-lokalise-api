<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;
use Lokalise\Endpoints\PermissionTemplates;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class PermissionTemplatesTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|PermissionTemplates */
    private $mockedPermisionTemplates;

    protected function setUp(): void
    {
        $this->mockedContributors = $this->createEndpointMock(PermissionTemplates::class);
    }

    protected function tearDown(): void
    {
        $this->mockedContributors = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedContributors);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedContributors);
    }

    public function testList(): void
    {
        $teamId = '1';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/roles",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedContributors->list($teamId)->getContent()
        );
    }
}