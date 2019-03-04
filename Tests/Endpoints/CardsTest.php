<?php

use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\Cards;

final class CardsTest extends TestCase
{
    /** @var Cards */
    protected $mockedCards;

    protected function setUp()
    {
        $this->mockedCards = $this
            ->getMockBuilder(Cards::class)
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
                'uri' => "cards",
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
                'uri' => "cards",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'cards',
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
                'uri' => "cards/$cardId",
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
                'uri' => "cards",
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
                'uri' => "cards/{$cardId}",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedCards->delete($cardId)
        );
    }
}
