<?php

namespace Lokalise\Tests\Endpoints;

use Lokalise\Endpoints\Endpoint;
use Lokalise\LokaliseApiResponse;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

trait MockEndpointTrait
{
    private function createEndpointMock(string $endpointClassName): Endpoint
    {
        $mock = $this
            ->getMockBuilder($endpointClassName)
            ->disableOriginalConstructor()
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->onlyMethods(['request', 'requestAll'])
            ->getMock();

        $mock->method('request')->willReturnCallback(
            function (string $requestType, string $uri, array $queryParams = [], array $body = []): LokaliseApiResponse {
                $lokaliseApiResponse = new LokaliseApiResponse($this->createMock(ResponseInterface::class));

                $reflection = new ReflectionClass($lokaliseApiResponse);
                $property = $reflection->getProperty('body');
                $property->setAccessible(true);
                $property->setValue($lokaliseApiResponse, [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ]);

                return $lokaliseApiResponse;
            }
        );

        $mock->method('requestAll')->willReturnCallback(
            function (string $requestType, string $uri, array $queryParams = [], array $body = [], string $bodyResponseKey = ''): LokaliseApiResponse {
                $lokaliseApiResponse = new LokaliseApiResponse($this->createMock(ResponseInterface::class));

                $reflection = new ReflectionClass($lokaliseApiResponse);
                $property = $reflection->getProperty('body');
                $property->setAccessible(true);

                $property->setValue($lokaliseApiResponse, [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                    'bodyResponseKey' => $bodyResponseKey,
                ]);

                return $lokaliseApiResponse;
            }
        );

        return $mock;
    }
}
