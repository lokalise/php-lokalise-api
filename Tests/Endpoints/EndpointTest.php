<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lokalise\Endpoints\Endpoint;
use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse as ApiResponse;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class EndpointTest extends TestCase
{

    private function callPrivateMethod($class, string $name, array $arguments = [])
    {
        $reflectionClass = new ReflectionClass(get_class($class));
        $method = $reflectionClass->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($class, $arguments);
    }

    private function getMockClient($status = 200, $headers = [], $body = null): Client
    {
        return new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        $status,
                        $headers,
                        json_encode($body, JSON_THROW_ON_ERROR)
                    ),
                ])
            ),
        ]);
    }

    public function testQueryParamsToQueryString(): void
    {
        $endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
        $params = [
            'param1' => 2,
            'param2' => 'exist',
            'array' => [
                'first' => 'Hello',
                'second' => 'World',
            ],
        ];
        $result = $this->callPrivateMethod($endpoint, 'queryParamsToQueryString', [$params]);

        self::assertEquals(
            'param1=2&param2=exist&array%5Bfirst%5D=Hello&array%5Bsecond%5D=World',
            $result
        );
    }

    /**
     * @covers \Lokalise\Endpoints\Endpoint::replaceArrayWithCommaSeparatedString
     */
    public function testFixArraysInQueryParams(): void
    {
        $endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
        $params = [
            'param1' => 'single',
            'param2' => [
                'first' => 'Hello',
                'second' => 'World',
            ],
            'param3' => [
                'first',
                'second',
            ],
        ];
        $result = $this->callPrivateMethod($endpoint, 'fixArraysInQueryParams', [$params]);

        self::assertEquals(
            [
                'param1' => 'single',
                'param2' => 'Hello,World',
                'param3' => 'first,second',
            ],
            $result
        );
    }

    public function testRequest(): void
    {
        $endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
        $client = $this->getMockClient(
            $status = 200,
            $headers = [
                'X-Pagination-Total-Count' => 14,
                'X-Pagination-Page-Count' => 2,
                'X-Pagination-Limit' => 10,
                'X-Pagination-Page' => 1,
                'X-Pagination-Next-Cursor' => '',
            ],
            $body = [
                'response' => 'success',
            ]
        );
        $this->callPrivateMethod($endpoint, 'setClient', [$client]);

        /** @var ApiResponse $apiResponse */
        $apiResponse = $this->callPrivateMethod($endpoint, 'request', ['GET', '']);

        self::assertInstanceOf(ApiResponse::class, $apiResponse);
        self::assertEquals($headers, $apiResponse->headers);
        self::assertEquals($body, $apiResponse->getContent());
    }

    public function testRequestApiException(): void
    {
        $endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
        $this->expectException(LokaliseApiException::class);
        $this->expectExceptionCode(404);

        $client = $this->getMockClient(404);
        $this->callPrivateMethod($endpoint, 'setClient', [$client]);
        $this->callPrivateMethod($endpoint, 'request', ['GET', '']);
    }

    public function testRequestResponseException(): void
    {
        $endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
        $this->expectException(LokaliseResponseException::class);
        $this->expectExceptionMessage('test');
        $this->expectExceptionCode(401);

        $body = ['error' => ['code' => 401, 'message' => 'test']];

        $client = $this->getMockClient(500, [], $body);
        $this->callPrivateMethod($endpoint, 'setClient', [$client]);
        $this->callPrivateMethod($endpoint, 'request', ['GET', '']);
    }

    public function testRequestAll(): void
    {
        $endpoint = new class('https://api.lokalise.com/api2', '{Test_Api_Token}') extends Endpoint {
            public function fetchAll(): ApiResponse
            {
                return $this->requestAll('GET', '', [], [], 'mockedResults');
            }
        };
        $client = new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 1,
                            "X-Pagination-Page-Count" => 2,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 1"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 2,
                            "X-Pagination-Page-Count" => 2,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 2"]]], JSON_THROW_ON_ERROR)
                    ),
                ])
            ),
        ]);

        $endpoint->setClient($client);

        $apiResponse = $endpoint->fetchAll();

        self::assertEquals([
            "mockedResults" => [
                ["id" => "element from page 1"],
                ["id" => "element from page 2"],
            ],
        ], $apiResponse->getContent());
    }

    public function testRequestAllUsingPaging(): void
    {
        $endpoint = new class('https://api.lokalise.com/api2', '{Test_Api_Token}') extends Endpoint {
            public function fetchAll(): ApiResponse
            {
                return $this->requestAllUsingPaging('GET', '', [], [], 'mockedResults');
            }
        };
        $client = new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 1,
                            "X-Pagination-Page-Count" => 3,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 1 using paging"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 2,
                            "X-Pagination-Page-Count" => 3,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 2 using paging"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 3,
                            "X-Pagination-Page-Count" => 3,
                        ],
                        json_encode(['mockedResults' => []], JSON_THROW_ON_ERROR)
                    ),
                ])
            ),
        ]);

        $endpoint->setClient($client);

        $apiResponse = $endpoint->fetchAll();

        self::assertEquals([
            "mockedResults" => [
                ["id" => "element from page 1 using paging"],
                ["id" => "element from page 2 using paging"],
            ]
        ], $apiResponse->getContent());

        self::assertArrayNotHasKey("X-Response-Too-Big", $apiResponse->headers);
    }

    public function testRequestAllUsingCursor(): void
    {
        $endpoint = new class('https://api.lokalise.com/api2', '{Test_Api_Token}') extends Endpoint {
            public function fetchAll(): ApiResponse
            {
                return $this->requestAllUsingCursor('GET', '', [], [], 'mockedResults');
            }
        };
        $client = new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        200,
                        [
                            "X-Pagination-Next-Cursor" => "cursor_list_1",
                            "X-Pagination-Limit" => 10,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from cursor 1 using cursor"]]], JSON_THROW_ON_ERROR),
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Next-Cursor" => "cursor_list_2",
                            "X-Pagination-Limit" => 10,
                        ],
                        json_encode(['mockedResults' => [["id" => "element from cursor 2 using cursor"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Next-Cursor" => "",
                            "X-Pagination-Limit" => 10,
                        ],
                        json_encode(['mockedResults' => []], JSON_THROW_ON_ERROR)
                    ),
                ])
            ),
        ]);

        $endpoint->setClient($client);

        $apiResponse = $endpoint->fetchAll();

        self::assertEquals([
            "mockedResults" => [
                ["id" => "element from cursor 1 using cursor"],
                ["id" => "element from cursor 2 using cursor"],
            ],
        ], $apiResponse->getContent());
    }

    public function testRequestAllUsingPagingTooBigHeader(): void
    {
        $endpoint = new class('https://api.lokalise.com/api2', '{Test_Api_Token}') extends Endpoint {
            public function fetchAll(): ApiResponse
            {
                return $this->requestAllUsingPaging('GET', '', [], [], 'mockedResults');
            }
        };
        $client = new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 1,
                            "X-Pagination-Page-Count" => 3,
                            "X-Response-Too-Big" => "Too big project for sync export",
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 1 using paging"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 2,
                            "X-Pagination-Page-Count" => 3,
                            "X-Response-Too-Big" => "Too big project for sync export",
                        ],
                        json_encode(['mockedResults' => [["id" => "element from page 2 using paging"]]], JSON_THROW_ON_ERROR)
                    ),
                    new Response(
                        200,
                        [
                            "X-Pagination-Total-Count" => 14,
                            "X-Pagination-Limit" => 10,
                            "X-Pagination-Page" => 3,
                            "X-Pagination-Page-Count" => 3,
                            "X-Response-Too-Big" => "Too big project for sync export",
                        ],
                        json_encode(['mockedResults' => []], JSON_THROW_ON_ERROR)
                    ),
                ])
            ),
        ]);

        $endpoint->setClient($client);

        $apiResponse = $endpoint->fetchAll();

        self::assertEquals([
            "mockedResults" => [
                ["id" => "element from page 1 using paging"],
                ["id" => "element from page 2 using paging"],
            ]
        ], $apiResponse->getContent());

        self::assertArrayHasKey("X-Response-Too-Big", $apiResponse->headers);
    }
}
