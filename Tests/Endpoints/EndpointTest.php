<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace Lokalise\Tests\Endpoints;

use \PHPUnit\Framework\TestCase;
use \Lokalise\LokaliseApiResponse as ApiResponse;
use \Lokalise\Exceptions\LokaliseResponseException;
use \Lokalise\Exceptions\LokaliseApiException;
use \Lokalise\Endpoints\Endpoint;
use \GuzzleHttp\Client;
use \GuzzleHttp\Handler\MockHandler;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Psr7\Response;
use ReflectionClass;

final class EndpointTest extends TestCase
{

    /** @var Endpoint */
    protected $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new Endpoint('https://api.lokalise.com/api2', '{Test_Api_Token}');
    }

    protected function tearDown(): void
    {
        $this->endpoint = null;
    }

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
                        json_encode($body)
                    ),
                ])
            ),
        ]);
    }

    public function testQueryParamsToQueryString(): void
    {
        $params = [
            'param1' => 2,
            'param2' => 'exist',
            'array' => [
                'first' => 'Hello',
                'second' => 'World',
            ],
        ];
        $result = $this->callPrivateMethod($this->endpoint, 'queryParamsToQueryString', [$params]);

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
        $result = $this->callPrivateMethod($this->endpoint, 'fixArraysInQueryParams', [$params]);

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
        $client = $this->getMockClient(
            $status = 200,
            $headers = [
                'X-Pagination-Total-Count' => 14,
                'X-Pagination-Page-Count' => 2,
                'X-Pagination-Limit' => 10,
                'X-Pagination-Page' => 1,
            ],
            $body = [
                'response' => 'success',
            ]
        );
        $this->callPrivateMethod($this->endpoint, 'setClient', [$client]);

        /** @var ApiResponse $apiResponse */
        $apiResponse = $this->callPrivateMethod($this->endpoint, 'request', ['GET', '']);

        self::assertInstanceOf(ApiResponse::class, $apiResponse);
        self::assertEquals($headers, $apiResponse->headers);
        self::assertEquals($body, $apiResponse->getContent());
    }

    public function testRequestApiException(): void
    {
        $this->expectException(LokaliseApiException::class);
        $this->expectExceptionCode(404);

        $client = $this->getMockClient(404);
        $this->callPrivateMethod($this->endpoint, 'setClient', [$client]);
        $this->callPrivateMethod($this->endpoint, 'request', ['GET', '']);
    }

    public function testRequestResponseException(): void
    {
        $this->expectException(LokaliseResponseException::class);
        $this->expectExceptionMessage('test');
        $this->expectExceptionCode(401);

        $body = ['error' => ['code' => 401, 'message' => 'test']];

        $client = $this->getMockClient(500, [], $body);
        $this->callPrivateMethod($this->endpoint, 'setClient', [$client]);
        $this->callPrivateMethod($this->endpoint, 'request', ['GET', '']);
    }
}
