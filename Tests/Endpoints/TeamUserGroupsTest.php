<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\Endpoints\TeamUsers;
use \PHPUnit\Framework\MockObject\MockObject;

final class TeamUserGroupsTest extends TestCase
{

    /** @var MockObject */
    protected $mockedTeamUsers;

    protected function setUp()
    {
        $this->mockedTeamUsers = $this
            ->getMockBuilder(TeamUsers::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedTeamUsers->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedTeamUsers->method('requestAll')->willReturnCallback(
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
        $this->mockedTeamUsers = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedTeamUsers);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedTeamUsers);
    }

    public function testList()
    {
        $teamId = '{Team_Id}';
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedTeamUsers->list($teamId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $teamId = '{Team_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'team_users',
            ],
            $this->mockedTeamUsers->fetchAll($teamId)
        );
    }

    public function testRetrieve()
    {
        $teamId = '{Team_Id}';
        $userId = '{User_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUsers->retrieve($teamId, $userId)
        );
    }

    public function testUpdate()
    {
        $teamId = '{Team_Id}';
        $userId = '{User_Id}';
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedTeamUsers->update($teamId, $userId, $body)
        );
    }

    public function testDelete()
    {
        $teamId = '{Team_Id}';
        $userId = '{User_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "teams/$teamId/users/$userId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedTeamUsers->delete($teamId, $userId)
        );
    }
}
