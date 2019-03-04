<?php

use \PHPUnit\Framework\TestCase;
use Lokalise\Endpoints\TranslationProviders;

final class TranslationProvidersTest extends TestCase
{
    /** @var TranslationProviders */
    protected $mockedProviders;

    protected function setUp()
    {
        $this->mockedProviders = $this
            ->getMockBuilder(TranslationProviders::class)
            ->setConstructorArgs([null, '{Test_Api_Token}'])
            ->setMethods(['request', 'requestAll'])
            ->getMock();

        $this->mockedProviders->method('request')->willReturnCallback(
            function ($requestType, $uri, $queryParams = [], $body = []) {
                return [
                    'requestType' => $requestType,
                    'uri' => $uri,
                    'queryParams' => $queryParams,
                    'body' => $body,
                ];
            }
        );

        $this->mockedProviders->method('requestAll')->willReturnCallback(
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
        $this->mockedProviders = null;
    }

    public function testEndpointClass()
    {
        $this->assertInstanceOf('\Lokalise\Endpoints\Endpoint', $this->mockedProviders);
        $this->assertInstanceOf('\Lokalise\Endpoints\EndpointInterface', $this->mockedProviders);
    }

    public function testList()
    {
        $getParameters = ['params' => ['any']];

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "translation_providers",
                'queryParams' => $getParameters,
                'body' => [],
            ],
            $this->mockedProviders->list($getParameters)
        );
    }

    public function testFetchAll()
    {
        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "translation_providers",
                'queryParams' => [],
                'body' => [],
                'bodyResponseKey' => 'translation_providers',
            ],
            $this->mockedProviders->fetchAll()
        );
    }

    public function testRetrieve()
    {
        $providerId = '{Provider_Id}';

        $this->assertEquals(
            [
                'requestType' => 'GET',
                'uri' => "translation_providers/$providerId",
                'queryParams' => [],
                'body' => [],
            ],
            $this->mockedProviders->retrieve($providerId)
        );
    }
}
