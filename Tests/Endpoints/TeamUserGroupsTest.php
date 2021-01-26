<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\TeamUserGroups;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Endpoints\EndpointInterface;

final class TeamUserGroupsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var TeamUserGroups|MockObject */
    private $mockedTeamUserGroups;

    protected function setUp(): void
    {
        $this->mockedTeamUserGroups = $this->createEndpointMock(TeamUserGroups::class);
    }

    protected function tearDown(): void
    {
        $this->mockedTeamUserGroups = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedTeamUserGroups);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedTeamUserGroups);
    }

    public function testList(): void
    {
        $teamId = 123;
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeamUserGroups->list($teamId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'user_groups',
            ],
            $this->mockedTeamUserGroups->fetchAll($teamId)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $teamId = 123;
        $groupId = 456;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUserGroups->retrieve($teamId, $groupId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $teamId = 123;
        $groupId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->update($teamId, $groupId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $teamId = 123;
        $groupId = 456;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUserGroups->delete($teamId, $groupId)->getContent()
        );
    }

    public function testAddProjects(): void
    {
        $teamId = 123;
        $groupId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/projects/add",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->addProjects($teamId, $groupId, $body)->getContent()
        );
    }

    public function testRemoveProjects(): void
    {
        $teamId = 123;
        $groupId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/projects/remove",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->removeProjects($teamId, $groupId, $body)->getContent()
        );
    }

    public function testAddMembers(): void
    {
        $teamId = 123;
        $groupId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/members/add",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->addMembers($teamId, $groupId, $body)->getContent()
        );
    }

    public function testCreate(): void
    {
        $teamId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "teams/$teamId/groups",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->create($teamId, $body)->getContent()
        );
    }

    public function testRemoveMembers(): void
    {
        $teamId = 123;
        $groupId = 456;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/members/remove",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->removeMembers($teamId, $groupId, $body)->getContent()
        );
    }
}
