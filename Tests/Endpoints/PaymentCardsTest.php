<?php

use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\PaymentCards;

final class PaymentCardsTest extends TestCase
{
    /** @var PaymentCards */
    protected $mockedCards;

    protected function setUp()
    {
        $this->mockedCards = $this
            ->getMockBuilder(PaymentCards::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedCards->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedCards->method('requestAll')->willReturnCallback(
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
        $this->mockedCards = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedCards);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedCards);
    }

    public function testList()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedCards->list($getParameters)
        );
    }

    public function testFetchAll()
    {
        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'payment_cards',
            ],
            $this->mockedCards->fetchAll()
        );
    }

    public function testRetrieve()
    {
        $cardId = '{Card_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "payment_cards/$cardId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCards->retrieve($cardId)
        );
    }

    public function testCreate()
    {
        $body = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'POST',
                'uri' => "payment_cards",
                'queryParams' => [],
                'body' => $body,
            ],
            $this->mockedCards->create($body)
        );
    }

    public function testDelete()
    {
        $cardId = '{Card_Id}';

        $this->assertEquals(
            [
                'requestType' => 'DELETE',
                'uri' => "payment_cards/{$cardId}",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCards->delete($cardId)
        );
    }
}
