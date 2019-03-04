<?php

use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\Orders;

final class OrdersTest extends TestCase
{
    /** @var Orders */
    protected $mockedOrders;

    protected function setUp()
    {
        $this->mockedOrders = $this
            ->getMockBuilder(Orders::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedOrders->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedOrders->method('requestAll')->willReturnCallback(
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
        $this->mockedOrders = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedOrders);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedOrders);
    }

    public function testList()
    {
        $getParameters = ['params' => ['any']];

        $teamId = '{Team_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedOrders->list($teamId, $getParameters)
        );
    }

    public function testFetchAll()
    {
        $teamId = '{Team_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'orders',
            ],
            $this->mockedOrders->fetchAll($teamId)
        );
    }

    public function testRetrieve()
    {
        $teamId = '{Team_Id}';
        $orderId = '{Order_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "teams/{$teamId}/orders/{$orderId}",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedOrders->retrieve($teamId, $orderId)
        );
    }

    public function testCreate()
    {
        $body = ['params' => ['any']];

        $teamId = '{Team_Id}';

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "teams/{$teamId}/orders",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedOrders->create($teamId, $body)
        );
    }
}
