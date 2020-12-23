<?php

namespace Lokalise\Tests;

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

    protected function setUp(): void
    {
        $this->apiClient = new ApiClient('{Test_Api_Token}');
    }

    protected function tearDown(): void
    {
        $this->apiClient = null;
    }

    public function testConstruct(): void
    {
        self::assertInstanceOf(ApiClient::class, $this->apiClient);

        self::assertInstanceOf(Comments::class, $this->apiClient->comments);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->comments);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->comments);

        self::assertInstanceOf(Contributors::class, $this->apiClient->contributors);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->contributors);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->contributors);

        self::assertInstanceOf(Files::class, $this->apiClient->files);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->files);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->files);

        self::assertInstanceOf(Keys::class, $this->apiClient->keys);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->keys);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->keys);

        self::assertInstanceOf(Languages::class, $this->apiClient->languages);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->languages);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->languages);

        self::assertInstanceOf(Projects::class, $this->apiClient->projects);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->projects);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->projects);

        self::assertInstanceOf(Screenshots::class, $this->apiClient->screenshots);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->screenshots);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->screenshots);

        self::assertInstanceOf(Snapshots::class, $this->apiClient->snapshots);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->snapshots);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->snapshots);

        self::assertInstanceOf(Tasks::class, $this->apiClient->tasks);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->tasks);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->tasks);

        self::assertInstanceOf(Teams::class, $this->apiClient->teams);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->teams);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->teams);

        self::assertInstanceOf(TeamUsers::class, $this->apiClient->teamUsers);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->teamUsers);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->teamUsers);

        self::assertInstanceOf(Translations::class, $this->apiClient->translations);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->translations);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->translations);

        self::assertInstanceOf(TeamUserGroups::class, $this->apiClient->teamUserGroups);
        self::assertInstanceOf(Endpoint::class, $this->apiClient->teamUserGroups);
        self::assertInstanceOf(EndpointInterface::class, $this->apiClient->teamUserGroups);
    }

    public function testEndpointUrl(): void
    {
        self::assertEquals(
            'https://api.lokalise.com/api2/',
            ApiClient::ENDPOINT
        );
    }

    public function testGetVersion(): void
    {
        self::assertStringMatchesFormat(
            '%d.%d.%d',
            $this->apiClient->getVersion()
        );
    }
}
