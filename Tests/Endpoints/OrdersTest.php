<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\Orders;
use Lokalise\Endpoints\EndpointInterface;
use Lokalise\Endpoints\Endpoint;

final class OrdersTest extends TestCase
{
    use MockEndpointTrait;

    /** @var Orders|MockObject */
    private $mockedOrders;

    protected function setUp(): void
    {
        $this->mockedOrders = $this->createEndpointMock(Orders::class);
    }

    protected function tearDown(): void
    {
        $this->mockedOrders = null;
    }

    public function testEndpointClass(): void
    {
        self::assertInstanceOf(Endpoint::class, $this->mockedOrders);
        self::assertInstanceOf(EndpointInterface::class, $this->mockedOrders);
    }

    public function testList(): void
    {
        $getParameters = ['params' => ['any']];

        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedOrders->list($teamId, $getParameters)->getContent()
        );
    }

    public function testFetchAll(): void
    {
        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'orders',
            ],
            $this->mockedOrders->fetchAll($teamId)->getContent()
        );
    }

    public function testRetrieve(): void
    {
        $teamId = 123;
        $orderId = '{Order_Id}';

        self::assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders/{$orderId}",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedOrders->retrieve($teamId, $orderId)->getContent()
        );
    }

    public function testCreate(): void
    {
        $body = ['params' => ['any']];

        $teamId = 123;

        self::assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedOrders->create($teamId, $body)->getContent()
        );
    }
}
