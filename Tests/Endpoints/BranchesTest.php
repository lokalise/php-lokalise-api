<?php

declare(strict_types=1);


namespace Endpoints;

use Lokalise\Endpoints\Branches;
use Lokalise\Endpoints\EndpointInterface;
use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\Tests\Endpoints\MockEndpointTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;


class BranchesTest extends TestCase
{
    use MockEndpointTrait;

    /** @var MockObject|Branches */
    private $mockedBranches;

    protected function setUp(): void
    {
        $this->mockedBranches = $this->createEndpointMock(Branches::class);
    }

    protected function tearDown(): void
    {
        $this->mockedBranches = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Branches::class, $this->mockedBranches);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedBranches);
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testListBranches(): void
    {
        $projectId = '{Project_Id}';
        $getParameters = ['params' => ['any']];

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/branches",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this
                ->mockedBranches
                ->listBranches($projectId, $getParameters)
                ->getContent()
        );
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testRetrieve(): void
    {
        $projectId = '{Project_Id}';
        $branchId = 1;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "projects/$projectId/branches/$branchId",
                'queryParams' => [],
                'body' => [],
            ],
            $this
                ->mockedBranches
                ->retrieve($projectId, $branchId)
                ->getContent()
        );
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testCreate(): void
    {
        $projectId = '{Project_Id}';
        $body = [
            'key' => 'value',
        ];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/branches",
                'queryParams' => [],
                'body' => $body,
            ],
            $this
                ->mockedBranches
                ->create($projectId, $body)
                ->getContent()
        );
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testUpdate(): void
    {
        $projectId = '{Project_Id}';
        $branchId = 1;
        $body = [
            'key' => 'value',
        ];

        self::assertEquals(
            [
                'requestType' => 'PUT',
                'uri' => "projects/$projectId/branches/$branchId",
                'queryParams' => [],
                'body' => $body,
            ],
            $this
                ->mockedBranches
                ->update($projectId, $branchId, $body)
                ->getContent()
        );
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testDelete(): void
    {
        $projectId = '{Project_Id}';
        $branchId = 1;

        self::assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "projects/$projectId/branches/$branchId",
                'queryParams' => [],
                'body' => [],
            ],
            $this
                ->mockedBranches
                ->delete($projectId, $branchId)
                ->getContent()
        );
    }

    /**
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    public function testMerge(): void
    {
        $projectId = '{Project_Id}';
        $branchId = 1;
        $body = [
            'key' => 'value',
        ];

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "projects/$projectId/branches/$branchId/merge",
                'queryParams' => [],
                'body' => $body,
            ],
            $this
                ->mockedBranches
                ->merge($projectId, $branchId, $body)
                ->getContent()
        );
    }
}
