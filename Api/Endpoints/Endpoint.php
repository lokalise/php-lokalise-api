<?php

namespace Lokalise\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Lokalise\Exceptions\LokaliseApiException;
use Lokalise\Exceptions\LokaliseResponseException;
use Lokalise\LokaliseApiResponse;

class Endpoint implements EndpointInterface
{

    /** @var string $baseUrl API base URL */
    protected $baseUrl;

    /** @var null|string `X-Api-Token` authentication header */
    protected $apiToken;

    /**
     * Endpoint constructor.
     *
     * @param string $baseUrl parent::constant
     * @param string $apiToken Client provided authentication token
     */
    public function __construct($baseUrl, $apiToken)
    {
        $this->baseUrl = $baseUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @param string $requestType GET|POST|PUT|DELETE
     * @param string $uri
     * @param array $params
     * @param array $body
     *
     * @return LokaliseApiResponse
     * @throws LokaliseApiException
     */
    protected function request($requestType, $uri, $params = [], $body = [])
    {

        $client = new Client();

        $options = [
            'headers' => [
                'X-Api-Token' => $this->apiToken,
            ],
        ];
        if (!empty($params)) {
            $options['query'] = $params;
        }
        if (!empty($body)) {
            $options['json'] = $body;
        }

        try {
            $guzzleResponse = $client->request($requestType, "{$this->baseUrl}$uri", $options);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $guzzleResponse = $e->getResponse();
            } else {
                throw new LokaliseApiException($e->getMessage(), $e->getCode());
            }
        }

        $body = $guzzleResponse->getBody();
        if (is_null($body)) {
            throw new LokaliseApiException('Not found', 404);
        }
        $bodyJson = @json_decode($body, true);
        if (!is_array($bodyJson) || json_last_error() !== JSON_ERROR_NONE) {
            throw new LokaliseApiException('Not found', 404);
        }

        return new LokaliseApiResponse($guzzleResponse);
    }

    /**
     * @param $params
     *
     * @return null|string
     */
    protected function paramsToQueryString($params)
    {
        return (!empty($params) ? http_build_query($params) : null);
    }
}
