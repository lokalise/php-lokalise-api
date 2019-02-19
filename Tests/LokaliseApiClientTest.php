<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\LokaliseApiClient as ApiClient;
use \Lokalise\Endpoints\Endpoint;
use \Lokalise\Endpoints\EndpointInterface;
use \Lokalise\Endpoints\Comments;
use \Lokalise\Endpoints\Contributors;
use \Lokalise\Endpoints\Files;
use \Lokalise\Endpoints\Keys;
use \Lokalise\Endpoints\Languages;
use \Lokalise\Endpoints\Projects;
use \Lokalise\Endpoints\Screenshots;
use \Lokalise\Endpoints\Snapshots;
use \Lokalise\Endpoints\Tasks;
use \Lokalise\Endpoints\Teams;
use \Lokalise\Endpoints\TeamUsers;
use \Lokalise\Endpoints\Translations;
use Lokalise\Endpoints\TeamUserGroups;

final class LokaliseApiClientTest extends TestCase
{

    /** @var ApiClient */
    protected $apiClient;

    protected function setUp()
    {
        $this->apiClient = new ApiClient('{Test_Api_Token}');
    }

    protected function tearDown()
    {
        $this->apiClient = null;
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(ApiClient::class, $this->apiClient);

        $this->assertInstanceOf(Comments::class, $this->apiClient->comments);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->comments);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->comments);

        $this->assertInstanceOf(Contributors::class, $this->apiClient->contributors);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->contributors);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->contributors);

        $this->assertInstanceOf(Files::class, $this->apiClient->files);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->files);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->files);

        $this->assertInstanceOf(Keys::class, $this->apiClient->keys);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->keys);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->keys);

        $this->assertInstanceOf(Languages::class, $this->apiClient->languages);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->languages);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->languages);

        $this->assertInstanceOf(Projects::class, $this->apiClient->projects);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->projects);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->projects);

        $this->assertInstanceOf(Screenshots::class, $this->apiClient->screenshots);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->screenshots);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->screenshots);

        $this->assertInstanceOf(Snapshots::class, $this->apiClient->snapshots);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->snapshots);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->snapshots);

        $this->assertInstanceOf(Tasks::class, $this->apiClient->tasks);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->tasks);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->tasks);

        $this->assertInstanceOf(Teams::class, $this->apiClient->teams);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->teams);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->teams);

        $this->assertInstanceOf(TeamUsers::class, $this->apiClient->teamUsers);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->teamUsers);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->teamUsers);

        $this->assertInstanceOf(Translations::class, $this->apiClient->translations);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->translations);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->translations);

        $this->assertInstanceOf(TeamUserGroups::class, $this->apiClient->teamUserGroups);
        $this->assertInstanceOf(Endpoint::class, $this->apiClient->teamUserGroups);
        $this->assertInstanceOf(EndpointInterface::class, $this->apiClient->teamUserGroups);
    }

    public function testEndpointUrl()
    {
        $this->assertEquals(
            'https://api.lokalise.co/api2/',
            ApiClient::ENDPOINT
        );
    }

    public function testGetVersion()
    {
        $this->assertStringMatchesFormat(
            '%d.%d.%d',
            $this->apiClient->getVersion()
        );
    }
}
