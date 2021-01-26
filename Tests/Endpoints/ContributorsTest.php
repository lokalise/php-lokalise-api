<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use Lokalise\Endpoints\EndpointInterface;
use Lokalise\Endpoints\Endpoint;
use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\Contributors;
use PHPUnit\Framework\MockObject\MockObject;

final class ContributorsTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Contributors */
    private $mockedContributors;

    protected function setUp(): void
    {
        $this->mockedContributors = $this->createEndpointMock(Contributors::class);
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
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedContributors->list($projectId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $projectId = '{Project_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'contributors',
            ],
            $this->mockedContributors->fetchAll($projectId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/contributors",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedContributors->create($projectId, $body)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $contributorId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedContributors->retrieve($projectId, $contributorId)->getContent()
        );
    }

    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $contributorId = 123;
        $body = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedContributors->update($projectId, $contributorId, $body)->getContent()
        );
    }

    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $contributorId = 123;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/contributors/$contributorId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedContributors->delete($projectId, $contributorId)->getContent()
        );
    }
}
