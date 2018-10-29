<?php

use \PHPUnit\Framework\TestCase;
use \Lokalise\LokaliseApiResponse as ApiResponse;
use \GuzzleHttp\Client;
use \GuzzleHttp\Handler\MockHandler;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Psr7\Response;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Exception\GuzzleException;

final class LokaliseApiResponseTest extends TestCase
{

    private $headers;

    protected function setUp()
    {
        $this->headers = [
            'X-Pagination-Total-Count' => 14,
            'X-Pagination-Page-Count' => 2,
            'X-Pagination-Limit' => 10,
            'X-Pagination-Page' => 1,
        ];
    }

    protected function tearDown()
    {
        $this->headers = null;
    }

    public function testHeaders()
    {
        $apiResponse = $this->getApiResponse(200, $this->headers);

        $this->assertEquals($this->headers, $apiResponse->headers);
    }

    public function testGetTotalCount()
    {
        $apiResponse = $this->getApiResponse(200, $this->headers);

        $this->assertEquals($this->headers['X-Pagination-Total-Count'], $apiResponse->getTotalCount());
    }

    public function testGetPageCount()
    {
        $apiResponse = $this->getApiResponse(200, $this->headers);

        $this->assertEquals($this->headers['X-Pagination-Page-Count'], $apiResponse->getPageCount());
    }

    public function testGetPaginationLimit()
    {
        $apiResponse = $this->getApiResponse(200, $this->headers);

        $this->assertEquals($this->headers['X-Pagination-Limit'], $apiResponse->getPaginationLimit());
    }

    public function testGetPaginationPage()
    {
        $apiResponse = $this->getApiResponse(200, $this->headers);

        $this->assertEquals($this->headers['X-Pagination-Page'], $apiResponse->getPaginationPage());
    }

    public function testBody()
    {
        $body = ['keys' => ['one' => 'key']];
        $apiResponse = $this->getApiResponse(200, [], $body);

        $this->assertEquals($body, $apiResponse->body);
    }

    public function testGetContent()
    {
        $body = ['keys' => ['one' => 'key']];
        $apiResponse = $this->getApiResponse(200, [], $body);

        $this->assertEquals($body, $apiResponse->getContent());
    }

    public function testToArray()
    {
        $body = ['keys' => ['one' => 'key']];
        $apiResponse = $this->getApiResponse(200, [], $body);

        $this->assertEquals($body, $apiResponse->getContent());
        $this->assertEquals($body, $apiResponse->__toArray());
    }

    public function testToString()
    {
        $body = ['keys' => ['one' => 'key']];
        $bodyString = '{"keys":{"one":"key"}}';
        $apiResponse = $this->getApiResponse(200, [], $body);

        $this->assertEquals($body, $apiResponse->getContent());
        $this->assertEquals($bodyString, $apiResponse->__toString());
    }

    /**
     * @param int $status
     * @param array $headers
     * @param null|array $body
     * @return ApiResponse
     */
    private function getApiResponse($status = 200, $headers = [], $body = null)
    {
        $client = new Client([
            'handler' => HandlerStack::create(
                new MockHandler([
                    new Response(
                        $status,
                        $headers,
                        json_encode($body)
                    )
                ])
            )
        ]);

        try {
            $guzzleResponse = $client->request('GET', null);
        } catch (RequestException $e) {
            $guzzleResponse = new Response($status, $headers, json_encode($body));
        } catch (GuzzleException $e) {
            $guzzleResponse = new Response($status, $headers, json_encode($body));
        }

        return new ApiResponse($guzzleResponse);
    }
}
