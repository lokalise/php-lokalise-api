<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\TeamUsers;
use \PHPUnit\Framework\MockObject\MockObject;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TeamUsersTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|TeamUsers */
    private $mockedTeamUsers;

    protected function setUp(): void
    {
        $this->mockedTeamUsers = $this->createEndpointMock(TeamUsers::class);
    }

    protected function tearDown(): void
    {
        $this->mockedTeamUsers = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedTeamUsers);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedTeamUsers);
    }

    public function testList(): void
    {
        $teamId = 123;
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeamUsers->list($teamId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'team_users',
            ],
            $this->mockedTeamUsers->fetchAll($teamId)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $teamId = 123;
        $userId = 456;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUsers->retrieve($teamId, $userId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $teamId = 123;
        $userId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUsers->update($teamId, $userId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $teamId = 123;
        $userId = 456;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUsers->delete($teamId, $userId)->getContent()
        );
    }
}
