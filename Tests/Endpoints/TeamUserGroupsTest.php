<?php

use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\TeamUserGroups;

final class TeamUserGroupsTest extends TestCase
{

    /** @var TeamUserGroups */
    protected $mockedTeamUserGroups;

    protected function setUp()
    {
        $this->mockedTeamUserGroups = $this
            ->getMockBuilder(TeamUserGroups::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedTeamUserGroups->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedTeamUserGroups->method('requestAll')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = [], $bodyResponseKey = '') {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                    'bodyResponseKey' => $bodyResponseKey,
                ];
            }
        );
    }

    protected function tearDown()
    {
        $this->mockedTeamUserGroups = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedTeamUserGroups);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedTeamUserGroups);
    }

    public function testList()
    {
        $teamId = '{Team_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeamUserGroups->list($teamId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $teamId = '{Team_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'user_groups',
            ],
            $this->mockedTeamUserGroups->fetchAll($teamId)
        );
    }

    public function testRetrieve()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUserGroups->retrieve($teamId, $groupId)
        );
    }

    public function testUpdate()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->update($teamId, $groupId, $body)
        );
    }

    public function testDelete()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "teams/$teamId/groups/$groupId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUserGroups->delete($teamId, $groupId)
        );
    }

    public function testAddProjects()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/projects/add",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->addProjects($teamId, $groupId, $body)
        );
    }

    public function testRemoveProjects()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/projects/remove",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->removeProjects($teamId, $groupId, $body)
        );
    }

    public function testAddMembers()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/members/add",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->addMembers($teamId, $groupId, $body)
        );
    }

    public function testCreate()
    {
        $teamId = '{Team_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "teams/$teamId/groups",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->create($teamId, $body)
        );
    }

    public function testRemoveMembers()
    {
        $teamId = '{Team_Id}';
        $groupId = '{Group_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/groups/$groupId/members/remove",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUserGroups->removeMembers($teamId, $groupId, $body)
        );
    }
}
