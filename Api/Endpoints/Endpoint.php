<?php

namespace Lokalise\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

class Endpoint implements EndpointInterface
{
    public const FETCH_ALL_LIMIT = 1_000;

    /** @var string $baseUrl API base URL */
    protected string $baseUrl;

    /** @var string `X-Api-Token` authentication header */
    protected string $apiToken;

    private ?Client $client = null;

    /**
     * Endpoint constructor.
     *
     * @param string $baseUrl parent::constant
     * @param string $apiToken Client provided authentication token
     */
    public function __construct(string $baseUrl, string $apiToken)
    {
        $this->baseUrl = $baseUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @param string $requestType GET|POST|PUT|PATCH|DELETE
     * @param string $uri
     * @param array $queryParams
     * @param array $body
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    protected function request(string $requestType, string $uri, array $queryParams = [], array $body = []): LokaliseApiResponse
    {
        if (is_null($this->client)) {
            $this->setClient(new Client());
        }

        $options = [
            'headers' => [
                'X-Api-Token' => $this->apiToken,
            ],
        ];
        if (!empty($queryParams)) {
            $options['query'] = $this->fixArraysInQueryParams($queryParams);
        }
        if (!empty($body)) {
            $options['json'] = $body;
        }

        try {
            $guzzleResponse = $this->client->request($requestType, "{$this->baseUrl}$uri", $options);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $guzzleResponse = $e->getResponse();
            } else {
                throw new LokaliseApiException($e->getMessage(), $e->getCode());
            }
        } catch (GuzzleException $e) {
            // From guzzle6-adapter 1.* the RequestException does not implement GuzzleException
            throw new LokaliseApiException($e->getMessage(), $e->getCode());
        }

        $responseBody = $guzzleResponse->getBody();
        if (is_null($responseBody)) {
            throw new LokaliseApiException('Not found', 404);
        }
        $bodyJson = @json_decode($responseBody, true);
        if (!is_array($bodyJson) || json_last_error() !== JSON_ERROR_NONE) {
            throw new LokaliseApiException('Not found', 404);
        }

        if (!empty($bodyJson['error']['code']) && isset($bodyJson['error']['message'])) {
            throw new LokaliseResponseException($bodyJson['error']['message'], $bodyJson['error']['code']);
        }

        return new LokaliseApiResponse($guzzleResponse);
    }

    /**
     * @param string $requestType
     * @param string $uri
     * @param array $queryParams
     * @param array $body
     * @param string $bodyResponseKey
     *
     * @return LokaliseApiResponse
     *
     * @throws LokaliseApiException
     * @throws LokaliseResponseException
     */
    protected function requestAll(
        string $requestType,
        string $uri,
        array $queryParams = [],
        array $body = [],
        string $bodyResponseKey = ''
    ): LokaliseApiResponse {
        $page = 1;
        $queryParams = array_merge($queryParams, ['limit' => static::FETCH_ALL_LIMIT, 'page' => $page]);

        $bodyData = [];
        $result = $this->request($requestType, $uri, $queryParams, $body);
        if (is_array($result->body[$bodyResponseKey])) {
            $bodyData = $result->body[$bodyResponseKey];
        }
        while ($result->getPageCount() > $page) {
            $page++;

            $queryParams['limit'] = static::FETCH_ALL_LIMIT;
            $queryParams['page'] = $page;

            $result = $this->request($requestType, $uri, $queryParams, $body);
            if (is_array($result->body[$bodyResponseKey])) {
                $bodyData = array_merge($result->body[$bodyResponseKey], $bodyData);
                $result->body[$bodyResponseKey] = $bodyData;
            }
        }

        return $result;
    }

    /**
     * @param array $queryParams
     *
     * @return null|string
     */
    protected function queryParamsToQueryString($queryParams): ?string
    {
        return (!empty($queryParams) ? http_build_query($queryParams) : null);
    }

    /**
     * Method is replacing arrays in query parameters with comma separated values
     * @link https://lokalise.co/api2docs/curl/
     *
     * @param array $queryParams
     *
     * @return array
     */
    private function fixArraysInQueryParams(array $queryParams): array
    {
        foreach ($queryParams as $paramName => $paramValue) {
            $queryParams[$paramName] = $this->replaceArrayWithCommaSeparatedString($paramValue);
        }

        return $queryParams;
    }

    /**
     * Recursion method to replace arrays with imploded values
     *
     * @param mixed $array
     *
     * @return array|string
     */
    private function replaceArrayWithCommaSeparatedString($array)
    {
        if (is_array($array)) {
            $foundMultiDimension = false;
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $foundMultiDimension = true;
                }
            }
            if (!$foundMultiDimension) {
                return implode(',', $array);
            }

            foreach ($array as $key => $value) {
                $array[$key] = $this->replaceArrayWithCommaSeparatedString($value);
            }

            return $this->replaceArrayWithCommaSeparatedString($array);
        }

        return $array;
    }

}
